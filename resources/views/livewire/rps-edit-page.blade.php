    <div class="py-8 px-16 sm:ml-64 mt-16">
        <h2>Edit RPS untuk: {{ $rps->mataKuliah->nama_matkul_id }}</h2>

        <form wire:submit.prevent="saveRps">

            <h1>RPS INDUK</h1>

            <div>
                <label for="id_bk">Bahan Kajian:</label><br>
                <select wire:model="id_bk" required>
                    <option value="">-- Pilih Bahan Kajian --</option>
                    @foreach ($allBahanKajian as $bk)
                        <option value="{{ $bk->id_bk }}" >{{ $bk->nama_kode_bk }} - {{ $bk->nama_bk_id }}</option>
                    @endforeach
                </select> 
            </div>
            <br>

            <div wire:ignore>
                <label for="cpl_ids_select">CPL yang Dibebankan:</label><br>
                {{-- Gunakan Select2 untuk pengalaman yang lebih baik --}}
                <select id="cpl_ids_select"  class="select2 w-48" multiple="multiple" required>
                    @foreach ($allCpl as $cpl)
                        <option value="{{ $cpl->id_cpl }}" >{{ $cpl->nama_kode_cpl }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            <div>
                <label for="id_mk_syarat">Mata Kuliah Prasyarat:</label><br>
                <select wire:model="id_mk_syarat" >
                    <option value="">Tidak ada Matkul Prasyarat</option>
                    @foreach ($allMataKuliah as $mk)
                        <option value="{{ $mk->id_mk }}" >{{ $mk->nama_matkul_id }}</option>
                    @endforeach
                </select>                
            </div>

            <br>
            <div>
                <label for="materi_pembelajaran">Materi Pembelajaran:</label><br>
                <textarea wire:model="materi_pembelajaran" rows="5"></textarea>
            </div>

            <br>
            
            <div>
                <label for="pustaka_utama">Pustaka Utama:</label><br>
                <textarea wire:model="pustaka_utama" rows="5"></textarea>
            </div>

            <br>

            <div>
                <label for="pustaka_pendukung">Pustaka pendukung:</label><br>
                <textarea wire:model="pustaka_pendukung" rows="5"></textarea>
            </div>
            <br>

            <h1>RPS DETAIL</h1>


            <div class="overflow-x-auto">
                <table class="w-full text-sm border">
                    <thead>
                        <tr>
                            <th class="p-2 border">Sub-CPMK</th>
                            <th class="p-2 border">Indikator</th>
                            <th class="p-2 border">Kriteria & Teknik Penilaian</th>
                            <th class="p-2 border">Materi Pembelajaran</th>
                            <th class="p-2 border">Metode</th>
                            <th class="p-2 border">Bobot (%)</th>
                            <th class="p-2 border">Minggu Ke-</th>
                            <th class="p-2 border">Aksi</th>                        
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($topics as $index => $topic )
                            <tr wire:key="topic-{{ $index }}-{{ $forceRefresh }}-{{ count($topics) }}">
                                <td class="p-2 border" >
                                    <label for="">SubCpmk</label>
                                    <select wire:model="topics.{{ $index }}.id_sub_cpmk" >
                                        <option value="">--pilih Sub-CPMK--</option>
                                        @foreach ($allSubCpmks as $scp )
                                            <option value="{{ $scp->id_sub_cpmk }}">{{ $scp->nama_kode_sub_cpmk }}</option>
                                        @endforeach
                                    </select>
                                    @error('topics.'.$index.'.id_sub_cpmk') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <textarea wire:model="topics.{{$index}}.indikator" id="indikator" cols="30" rows="10" class="border"></textarea>
                                </td>
                                <td>
                                    <textarea wire:model="topics.{{$index}}.kriteria_teknik_penilaian" id="kriteria_teknik_penilaian" cols="30" rows="10" class="border"></textarea>
                                </td>                            
                                <td>
                                    <textarea wire:model="topics.{{$index}}.metode_pembelajaran" id="metode_pembelajaran" cols="30" rows="10" class="border"></textarea>
                                </td>                            
                                <td>
                                    <textarea wire:model="topics.{{$index}}.materi_pembelajaran" id="materi_pembelajaran" cols="30" rows="10" class="border"></textarea>
                                </td>                            
                                <td>
                                    <input type="number" wire:model="topics.{{$index}}.bobot_penilaian" id="bobot_penilaian"  class="border"></input>
                                </td>
                                <td>
                                    <!-- Hidden input untuk Livewire -->
                                    <input type="hidden" 
                                           wire:model="topics.{{ $index }}.minggu_ke" 
                                           class="minggu-ke-hidden" 
                                           data-index="{{ $index }}">
                                    
                                    <!-- Select2 yang di-handle JavaScript -->
                                    <select class="select2-weeks" 
                                            multiple="multiple" 
                                            data-index="{{ $index }}" 
                                            data-selected="{{ implode(',', $topic['minggu_ke']) }}"
                                            id="select-weeks-{{ $index }}">
                                        @for ($i = 1 ; $i <= 16 ; $i++)
                                            <option value="{{$i}}">{{$i}}</option>
                                        @endfor
                                    </select>
                                    @error('topics.'.$index.'.minggu_ke') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                                </td>
                                <td>
                                    <button type="button" 
                                            data-index="{{ $index }}" 
                                            class="text-red-600 hover:text-red-800 font-bold btn-remove-row">
                                        Hapus
                                    </button>                                
                                </td>
                            </tr>
                        @empty
                            <td colspan="8" class="text-center p-4 text-gray-500">Belum ada topik. Silakan tambah baris baru.</td>                     
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4 flex justify-between">
                <div class="flex gap-2">
                    <button type="button" wire:click="addRow" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Baris</button>
                    <button type="button" wire:click="testAddRow" class="bg-purple-500 text-white px-4 py-2 rounded">Test Add</button>
                    <button type="button" wire:click="debugTopics" class="bg-yellow-500 text-white px-4 py-2 rounded">Debug</button>
                </div>
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded">Simpan Rencana Mingguan</button>
            </div>
            
            <!-- Debug info -->
            <div class="mt-2 text-sm text-gray-600">
                Topics count: {{ count($topics) }} | Force Refresh: {{ $forceRefresh }}
                <br>
                Topics indexes: {{ implode(', ', array_keys($topics)) }}
                <br>
                Last topic ID: {{ end($topics)['id_topic'] ?? 'null' }}
            </div>         
        </form>
    </div>
    <script>
        // Gunakan event 'livewire:init' untuk memastikan Livewire siap
        document.addEventListener('livewire:init', () => {
            
            // Inisialisasi Select2 untuk CPL
            const cplSelect = $('#cpl_ids_select');
            
            // unruk multiselect cpl
            function initCplSelect() {
                cplSelect.select2({
                    placeholder: "Pilih CPL",
                    allowClear: true
                });
            }

            // Panggil inisialisasi saat halaman pertama kali dimuat
            initCplSelect();

            // Set nilai awal Select2 dari data Livewire
            // JSON akan mengubah array PHP menjadi array JavaScript
            cplSelect.val(@json($cpl_ids)).trigger('change');

            // Kirim perubahan dari Select2 kembali ke Livewire
            cplSelect.on('change', function (e) {
                // @this.set() adalah cara JavaScript untuk mengubah properti di backend
                @this.set('cpl_ids', $(this).val());
            });

            // untuk multiselect minggu-ke
            function initWeekSelects() {
                console.log('Initializing week selects...', $('.select2-weeks').length, 'elements found');
                
                // Hapus semua instance Select2 yang sudah ada untuk mencegah duplikasi
                $('.select2-weeks').each(function() {
                    if ($(this).hasClass('select2-hidden-accessible')) {
                        $(this).select2('destroy');
                    }
                });
                
                // Inisialisasi semua select2-weeks
                $('.select2-weeks').each(function() {
                    const $select = $(this);
                    const index = $select.data('index');
                    const selectedData = $select.data('selected');
                    
                    console.log('Initializing select for index:', index, 'selected:', selectedData);
                    
                    // Initialize Select2
                    $select.select2({
                        placeholder: "Pilih Minggu",
                        allowClear: true,
                        width: '100%',
                        dropdownParent: $('body')
                    });
                    
                    // Set selected values from data attribute
                    if (selectedData) {
                        const selectedValues = selectedData.split(',').filter(v => v.trim() !== '');
                        $select.val(selectedValues).trigger('change.select2');
                    }
                    
                    // Event handler untuk sync dengan hidden input
                    $select.off('change.weekselect').on('change.weekselect', function (e) {
                        e.stopPropagation();
                        const currentIndex = $(this).data('index');
                        const values = $(this).val() || [];
                        
                        console.log('Week select changed for index:', currentIndex, 'values:', values);
                        
                        // Update hidden input
                        const $hiddenInput = $(`.minggu-ke-hidden[data-index="${currentIndex}"]`);
                        $hiddenInput.val(JSON.stringify(values)).trigger('input');
                        
                        // Also update Livewire directly
                        @this.set('topics.' + currentIndex + '.minggu_ke', values);
                    });
                });
            }

            // Panggil inisialisasi saat halaman pertama kali dimuat
            initWeekSelects();

            // Ini bagian pentingnya: dengarkan event dari Livewire
            // Jika ada perubahan pada properti cpl_ids di backend,
            // perbarui tampilan Select2 di frontend.
            Livewire.on('cplIdsUpdated', (cplIds) => {
                cplSelect.val(cplIds).trigger('change');
            });

            // Throttle function untuk mencegah spam
            let initTimeout;
            function throttledInitWeekSelects() {
                clearTimeout(initTimeout);
                initTimeout = setTimeout(() => {
                    initWeekSelects();
                }, 100);
            }

            // Hook untuk setiap perubahan DOM - dengan throttling
            Livewire.hook('morph.updated', (el, component) => {
                console.log('DOM morphed, scheduling reinit...');
                throttledInitWeekSelects();
            });

            // Event listener khusus untuk penambahan baris baru
            Livewire.on('rowAdded', (data) => {
                console.log('Row added event received:', data);
                console.log('Expected rows:', data.count, 'Current DOM rows:', $('tr[wire\\:key*="topic-"]').length);
                
                // Tunggu sebentar untuk DOM update, lalu init Select2
                setTimeout(() => {
                    console.log('After timeout - DOM rows:', $('tr[wire\\:key*="topic-"]').length);
                    initWeekSelects();
                }, 200);
            });

            // Event listener untuk penghapusan baris
            Livewire.on('rowRemoved', (data) => {
                console.log('Row removed event received:', data);
                console.log('Expected rows:', data.count, 'Current DOM rows:', $('tr[wire\\:key*="topic-"]').length);
                
                setTimeout(() => {
                    // Setelah penghapusan, update semua data-index yang mungkin berubah
                    updateAllIndexes();
                    initWeekSelects();
                }, 200);
            });

            // Function untuk update indexes setelah re-indexing di backend
            function updateAllIndexes() {
                console.log('Updating all indexes after re-indexing...');
                
                $('tr[wire\\:key*="topic-"]').each(function(newIndex) {
                    const $row = $(this);
                    
                    // Update data-index pada semua element dalam baris ini
                    $row.find('[data-index]').each(function() {
                        const $element = $(this);
                        const oldIndex = $element.data('index');
                        
                        if (oldIndex !== newIndex) {
                            console.log(`Updating index from ${oldIndex} to ${newIndex}`);
                            $element.attr('data-index', newIndex);
                            $element.data('index', newIndex);
                            
                            // Update ID jika ada
                            if ($element.attr('id')) {
                                const oldId = $element.attr('id');
                                const newId = oldId.replace(/\d+/, newIndex);
                                $element.attr('id', newId);
                            }
                        }
                    });
                });
            }

            // Reduced polling - hanya setiap 3 detik
            setInterval(() => {
                const uninitializedSelects = $('.select2-weeks').not('.select2-hidden-accessible');
                if (uninitializedSelects.length > 0) {
                    console.log('Found', uninitializedSelects.length, 'uninitialized selects');
                    throttledInitWeekSelects();
                }
            }, 3000);

            // Event delegation untuk button remove - HANYA SEKALI di luar semua function
            let removeEventBound = false;
            
            function bindRemoveEvents() {
                if (!removeEventBound) {
                    $(document).on('click.removeRow', '.btn-remove-row', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        // Dapatkan index dari DOM position untuk memastikan akurasi
                        const $button = $(this);
                        const $row = $button.closest('tr[wire\\:key*="topic-"]');
                        const actualIndex = $row.index();
                        const dataIndex = $button.data('index');
                        
                        console.log('Remove button clicked:');
                        console.log('- Data index:', dataIndex);
                        console.log('- Actual DOM index:', actualIndex);
                        console.log('- Row key:', $row.attr('wire:key'));
                        
                        // Gunakan actual index dari DOM position
                        @this.call('removeRow', actualIndex);
                    });
                    removeEventBound = true;
                    console.log('Remove event listener bound');
                }
            }
            
            // Bind remove events hanya sekali
            bindRemoveEvents();

            // Simplified observer - hanya untuk debugging
            const observer = new MutationObserver(function(mutations) {
                let hasTableChanges = false;
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'childList') {
                        const addedNodes = Array.from(mutation.addedNodes);
                        const removedNodes = Array.from(mutation.removedNodes);
                        
                        if (addedNodes.some(node => node.nodeType === 1 && (node.matches?.('tr[wire\\:key*="topic-"]') || node.querySelector?.('tr[wire\\:key*="topic-"]')))) {
                            console.log('New table row detected via observer');
                            hasTableChanges = true;
                        }
                        
                        if (removedNodes.some(node => node.nodeType === 1 && (node.matches?.('tr[wire\\:key*="topic-"]') || node.querySelector?.('tr[wire\\:key*="topic-"]')))) {
                            console.log('Table row removed via observer');
                            hasTableChanges = true;
                        }
                    }
                });
                
                // Trigger init hanya jika ada perubahan table yang relevan
                if (hasTableChanges) {
                    throttledInitWeekSelects();
                }
            });
            
            // Start observing table body only
            const tableBody = document.querySelector('tbody');
            if (tableBody) {
                observer.observe(tableBody, {
                    childList: true,
                    subtree: false // Tidak perlu deep observation
                });
            }
        });
    </script>
