<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CPLModel;
use App\Models\RPSModel;
use App\Models\RPSTopicModel;
use App\Models\MataKuliahModel;
use App\Models\BahanKajianModel;
use App\Models\TopicWeekMapModel;
use Illuminate\Support\Facades\DB;

class RpsEditPage extends Component
{
    public RPSModel $rps;

   // Properti untuk data induk RPS
    public $id_bk;
    public $cpl_ids = [];
    public $id_mk_syarat;
    public $indikator;
    public $kriteria_teknik_penilaian;
    public $materi_pembelajaran;
    public $pustaka_utama;
    public $pustaka_pendukung;

    // Properti untuk data detail mingguan
    public $topics = [];
    public $allSubCpmks = [];
    
    // Properti untuk pilihan dropdown
    public $allCpl = [];
    public $allBahanKajian = [];
    public $allMataKuliah = [];
    
    // Property untuk memaksa re-render jika diperlukan
    public $forceRefresh = 0;
    
    // Property untuk kontrol manual Select2
    public $select2NeedsReinit = false;

    public function mount(RPSModel $rps) {
        $this->rps = $rps;

        // untuk RPS Induk
        $this->id_bk = $rps->id_bk;
        $this->cpl_ids = $rps->cpls->pluck('id_cpl')->toArray();
        $this->id_mk_syarat = $rps->mataKuliahSyarat->first()?->id_mk;
        $this->materi_pembelajaran = $rps->materi_pembelajaran;
        $this->pustaka_utama = $rps->pustaka_utama;
        $this->pustaka_pendukung = $rps->pustaka_pendukung;

        // untuk RPS Detail
        $this->allSubCpmks = $rps->mataKuliah->cpmks->pluck('subCpmk')->flatten();
        $this->topics = $rps->topics()->with('weeks')->get()->map(function ($topic) {
            return [
                'id_topic' => $topic->id_topic,
                'id_sub_cpmk' => $topic->id_sub_cpmk,
                'indikator' => $topic->indikator,
                'kriteria_teknik_penilaian' => $topic->kriteria_teknik_penilaian,
                'metode_pembelajaran' => $topic->metode_pembelajaran,
                'materi_pembelajaran' => $topic->materi_pembelajaran,
                'bobot_penilaian' => $topic->bobot_penilaian,
                'minggu_ke' => $topic->weeks->pluck('minggu_ke')->toArray(),                
            ];
        })->toArray();

        $this->allCpl = CPLModel::all();
        $this->allBahanKajian = BahanKajianModel::all();
        $this->allMataKuliah = MataKuliahModel::where('id_mk', '!=', $rps->id_mk)->get();
    }

    public function addRow() {
        $this->topics[] = [
            'id_topic' => null, 
            'id_sub_cpmk' => '',
            'indikator' => '',
            'kriteria_teknik_penilaian' => '',
            'metode_pembelajaran' => '',
            'materi_pembelajaran' => '',
            'bobot_penilaian' => 0,
            'minggu_ke' => [], 
        ];
        
        // Simple force refresh
        $this->forceRefresh = microtime(true);
        
        // Log untuk debugging
        logger()->info('Row added. Total topics: ' . count($this->topics) . ' ForceRefresh: ' . $this->forceRefresh);
        
        // Dispatch event dengan delay untuk memastikan DOM terupdate
        $this->dispatch('rowAdded', [
            'count' => count($this->topics),
            'forceRefresh' => $this->forceRefresh
        ]);
    }

    // Method untuk test manual - tambah baris sederhana
    public function testAddRow() {
        $this->topics[] = [
            'id_topic' => null, 
            'id_sub_cpmk' => '',
            'indikator' => 'Test Row ' . (count($this->topics) + 1),
            'kriteria_teknik_penilaian' => '',
            'metode_pembelajaran' => '',
            'materi_pembelajaran' => '',
            'bobot_penilaian' => 0,
            'minggu_ke' => [], 
        ];
        
        $this->forceRefresh = time(); // Force dengan timestamp
        logger()->info('Test row added. Total: ' . count($this->topics));
    }

    public function removeRow($index) {
        if (isset($this->topics[$index]['id_topic'])) {
            RPSTopicModel::find($this->topics[$index]['id_topic'])->delete();
        }
        unset($this->topics[$index]);
        $this->topics = array_values($this->topics); // Re-index array
        
        // Simple force refresh
        $this->forceRefresh = microtime(true);
        
        // Log untuk debugging
        logger()->info('Row removed. Total topics: ' . count($this->topics) . ' ForceRefresh: ' . $this->forceRefresh);
        
        // Dispatch event
        $this->dispatch('rowRemoved', [
            'count' => count($this->topics),
            'forceRefresh' => $this->forceRefresh
        ]);
    }

    // Method yang dipanggil ketika topics berubah
    public function updatedTopics()
    {
        // Pastikan minggu_ke selalu array
        foreach ($this->topics as $index => $topic) {
            if (isset($topic['minggu_ke'])) {
                if (is_string($topic['minggu_ke'])) {
                    // Jika string JSON, decode
                    $decoded = json_decode($topic['minggu_ke'], true);
                    if (is_array($decoded)) {
                        $this->topics[$index]['minggu_ke'] = $decoded;
                    }
                }
            }
        }
        
        $this->forceRefresh++;
        logger()->info('Topics updated. Force refresh: ' . $this->forceRefresh);
    }

    // Mutator untuk handling minggu_ke
    public function updatedTopicsMingguKe($value, $key)
    {
        $parts = explode('.', $key);
        $index = $parts[0];
        
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) {
                $this->topics[$index]['minggu_ke'] = $decoded;
            }
        } else if (is_array($value)) {
            $this->topics[$index]['minggu_ke'] = $value;
        }
        
        logger()->info("Updated minggu_ke for index {$index}: " . json_encode($this->topics[$index]['minggu_ke']));
    }

    // Method untuk debugging - bisa dihapus nanti
    public function getTopicsCount() {
        return count($this->topics);
    }

    // Method debugging tambahan
    public function debugTopics()
    {
        logger()->info('Current topics state:', [
            'count' => count($this->topics),
            'topics' => $this->topics,
            'forceRefresh' => $this->forceRefresh
        ]);
        
        return [
            'count' => count($this->topics),
            'forceRefresh' => $this->forceRefresh
        ];
    }

    public function saveRps() {
    $this->validate([
        // validasi RPS Detail
        'topics.*.id_sub_cpmk' => 'required|exists:sub_cpmk,id_sub_cpmk',
        'topics.*.materi_pembelajaran' => 'required|string',
        'topics.*.metode_pembelajaran' => 'required|string',
        'topics.*.bobot_penilaian' => 'required|integer|min:0|max:100',
        'topics.*.minggu_ke' => 'array|min:1', 

        // validasi RPS Induk
        'id_bk' => 'required|exists:bahan_kajian,id_bk',
        'id_mk_syarat' => 'nullable|exists:mata_kuliah,id_mk',
        'cpl_ids' => 'required|array',
        'cpl_ids.*' => 'exists:cpl,id_cpl', // Pastikan setiap ID CPL valid
        'materi_pembelajaran' => 'nullable|string',
        'pustaka_utama' => 'nullable|string',
        'pustaka_pendukung' => 'nullable|string',
    ], [
        'topics.*.id_sub_cpmk.required' => 'Setiap topik harus memiliki Sub-CPMK.',
        'topics.*.materi_pembelajaran.required' => 'Setiap topik harus memiliki materi pembelajaran.',
        'topics.*.metode_pembelajaran.required' => 'Setiap topik harus memiliki metode pembelajaran.',
        'topics.*.bobot_penilaian.required' => 'Setiap topik harus memiliki bobot penilaian.',
        'topics.*.bobot_penilaian.min' => 'Bobot penilaian minimal 0.',
        'topics.*.bobot_penilaian.max' => 'Bobot penilaian maksimal 100.',
        'topics.*.minggu_ke.min' => 'Setiap topik harus dijadwalkan setidaknya untuk satu minggu. Silakan pilih minggu dari dropdown.',
        'id_bk.required' => 'Bahan kajian harus dipilih.',
        'cpl_ids.required' => 'CPL yang dibebankan harus dipilih minimal satu.',
    ]);

    // protected $messages = [
    //     'topics.*.id_sub_cpmk.required' => 'Setiap topik harus memiliki Sub-CPMK.',
    //     'topics.*.materi_pembelajaran.required' => 'Setiap topik harus memiliki materi pembelajaran.',
    //     'topics.*.minggu_ke.required' => 'Setiap topik harus dijadwalkan setidaknya untuk satu minggu.',        
    // ];

        DB::transaction(function () {
        $this->rps->update([
            'id_bk' => $this->id_bk,
            'materi_pembelajaran' => $this->materi_pembelajaran,
            'pustaka_utama' => $this->pustaka_utama,
            'pustaka_pendukung' => $this->pustaka_pendukung,
        ]);

        $this->rps->cpls()->sync($this->cpl_ids);
        $this->rps->mataKuliahSyarat()->sync($this->id_mk_syarat ?? []);
        
        foreach ($this->topics as $topicData) {
            $topic = RPSTopicModel::updateOrCreate(
            ['id_topic' => $topicData['id_topic'] ?? null],
                [
                    'id_rps' => $this->rps->id_rps,
                    'id_sub_cpmk' => $topicData['id_sub_cpmk'],
                    'indikator' => $topicData['indikator'],
                    'kriteria_teknik_penilaian' => $topicData['kriteria_teknik_penilaian'],
                    'metode_pembelajaran' => $topicData['metode_pembelajaran'],
                    'materi_pembelajaran' => $topicData['materi_pembelajaran'],
                    'bobot_penilaian' => $topicData['bobot_penilaian'],                    ]
            );

            TopicWeekMapModel::where('id_topic', $topic->id_topic)->delete();
            $weekMappings = [];
            foreach ($topicData['minggu_ke'] as $week) {
                $weekMappings[] = ['id_topic' => $topic->id_topic, 'minggu_ke' => $week];                }
                TopicWeekMapModel::insert($weekMappings);                
            }
        });
        return redirect(route('rps.show', $this->rps))->with('Success', 'Berhasil Memperbarui Rencana pembelajaran mingguan');
    }  

    public function render()
    {
        // Debug: Log data yang dikirim ke view
        logger()->info('Rendering RpsEditPage', [
            'topics_count' => count($this->topics),
            'forceRefresh' => $this->forceRefresh,
            'topics_data' => array_keys($this->topics)
        ]);
        
        return view('livewire.rps-edit-page');
    }

}
