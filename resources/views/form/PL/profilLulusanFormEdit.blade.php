<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Lulusan (PL)</title>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        .transition-opacity {
            transition: opacity 0.3s ease-in-out;
        }

        .is-deleting {
            opacity: 0.4;
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <div class="p-4 sm:p-8 sm:ml-64">
        <main class="mt-20 mb-5 max-w-5xl mx-auto">

            <form action="{{ route('profil-lulusan.updateAll') }}" method="POST">
                @csrf
                @method('PUT')

                <input type="hidden" name="id_ps" value="{{ session()->get('userRoleId') }}">

                <div class="bg-white p-8 sm:p-10 rounded-xl shadow-lg">

                    <div class="mb-10">
                        <h1 class="text-4xl font-bold text-gray-800">Edit Profil Lulusan (PL)</h1>
                    </div>

                    @if ($errors->any())
                        <div class="mb-8 p-4 text-sm text-red-800 rounded-lg bg-red-100" role="alert">
                            <span class="font-bold">Terjadi Kesalahan:</span>
                            <ul class="mt-2 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="space-y-10">
                        @forelse ($pl_data as $pl)
                            <div x-data="{ isDeleting: false }" class="transition-opacity"
                                :class="{ 'is-deleting': isDeleting }">
                                <div class="grid grid-cols-12 gap-x-6 gap-y-4">
                                    {{-- Kode PL --}}
                                    <div class="col-span-12 sm:col-span-2">
                                        <label for="kode_pl_{{ $pl->id_pl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Kode PL</label>
                                        <input type="text" id="kode_pl_{{ $pl->id_pl }}"
                                            name="pl[{{ $pl->id_pl }}][kode_pl]" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                            value="{{ old('pl.' . $pl->id_pl . '.kode_pl', $pl->kode_pl) }}" required>
                                    </div>

                                    {{-- Nama Profil Lulusan ID dan EN --}}
                                    <div class="col-span-12 sm:col-span-4">
                                        <label for="profil_lulusan_{{ $pl->id_pl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Nama Profil
                                            Lulusan (Indonesia)</label>
                                        <input type="text" id="profil_lulusan_{{ $pl->id_pl }}"
                                            name="pl[{{ $pl->id_pl }}][nama_pl_id]" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                            value="{{ old('pl.' . $pl->id_pl . '.nama_pl_id', $pl->nama_pl_id) }}"
                                            required>
                                    </div>

                                    <div class="col-span-12 sm:col-span-4">
                                        <label for="profil_lulusan_{{ $pl->id_pl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Nama Profil
                                            Lulusan (English)</label>
                                        <input type="text" id="profil_lulusan_{{ $pl->id_pl }}"
                                            name="pl[{{ $pl->id_pl }}][nama_pl_en]" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition"
                                            value="{{ old('pl.' . $pl->id_pl . '.nama_pl_en', $pl->nama_pl_en) }}"
                                            required>
                                    </div>

                                    {{-- Deskripsi Profil Lulusan ID dan EN --}}
                                    <div class="col-span-11 sm:col-span-5">
                                        <label for="desc_{{ $pl->id_pl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Deskripsi Profil Lulusan (Indonesia)</label>
                                        <textarea id="desc_{{ $pl->id_pl }}" name="pl[{{ $pl->id_pl }}][desc_pl_id]" rows="3" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>{{ old('pl.' . $pl->id_pl . '.desc_pl_id', $pl->desc_pl_id) }}</textarea>
                                    </div>

                                    <div class="col-span-11 sm:col-span-5">
                                        <label for="desc_{{ $pl->id_pl }}"
                                            class="block text-base font-medium text-gray-700 mb-2">Deskripsi Profil Lulusan (English)</label>
                                        <textarea id="desc_{{ $pl->id_pl }}" name="pl[{{ $pl->id_pl }}][desc_pl_en]" rows="3" :disabled="isDeleting"
                                            class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg block p-3 transition" required>{{ old('pl.' . $pl->id_pl . '.desc_pl_en', $pl->desc_pl_en) }}</textarea>
                                    </div>

                                    {{-- Delete Checkbox --}}
                                    <div class="col-span-1 flex items-center justify-center pt-8">
                                        <input type="checkbox" id="delete_{{ $pl->id_pl }}" name="delete_pl[]"
                                            value="{{ $pl->id_pl }}" class="hidden" x-model="isDeleting">
                                        <label for="delete_{{ $pl->id_pl }}"
                                            class="cursor-pointer text-gray-400 hover:text-red-600 transition"
                                            title="Tandai untuk dihapus">
                                            <svg :class="{ '!text-red-600': isDeleting }" class="w-7 h-7" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                </path>
                                            </svg>
                                        </label>
                                    </div>
                                </div>

                                @if (!$loop->last)
                                    <hr class="mt-10 border-gray-200">
                                @endif
                            </div>
                        @empty
                            <div class="text-center py-16 border-2 border-dashed border-gray-200 rounded-lg">
                                <p class="text-base text-gray-500">Data Profil Lulusan belum tersedia untuk diedit.</p>
                            </div>
                        @endforelse
                    </div>

                    @if ($pl_data->isNotEmpty())
                        <div class="mt-12 pt-8 border-t border-gray-200 flex justify-end items-center gap-x-4">
                            <a href="{{ route('profil-lulusan.index') }}"
                                class="px-6 py-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                Batal
                            </a>
                            <button type="submit"
                                class="flex items-center gap-x-2 text-white bg-biru-custom hover:opacity-90 font-medium rounded-lg text-base px-6 py-3 text-center">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4">
                                    </path>
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    @endif
                </div>
            </form>
        </main>
    </div>
</body>

</html>
