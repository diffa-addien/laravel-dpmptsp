<div>
    {{-- Form Pencarian dengan Judul Dinamis --}}
    <div class="w-full max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
        @if ($mode === 'syarat')
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Cek Syarat Permohonan Perizinan</h2>
            <p class="text-center text-gray-500 mb-6">Pilih kategori dan jenis permohonan untuk melihat detail persyaratan.</p>
        @else
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-2">Cek Cara Mendaftar Perizinan</h2>
            <p class="text-center text-gray-500 mb-6">Pilih kategori dan jenis permohonan untuk melihat alur pendaftaran.</p>
        @endif

        <div class="space-y-4">
            {{-- Dropdown Kategori (tidak berubah) --}}
            <div>
                <label for="kategori" class="block text-sm font-medium text-gray-700">Pilih Kategori Izin</label>
                <select id="kategori" wire:model.live="selectedKategori" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategoriList as $kategori)
                        <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Dropdown Jenis Permohonan (tidak berubah) --}}
            <div>
                <label for="perizinan" class="block text-sm font-medium text-gray-700">Pilih Jenis Permohonan</label>
                <select id="perizinan" wire:model.live="selectedPerizinan" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md" @if(empty($perizinanList)) disabled @endif>
                    <option value="">-- Pilih Jenis Permohonan --</option>
                    @foreach($perizinanList as $perizinan)
                        <option value="{{ $perizinan->id }}">{{ $perizinan->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Tombol Aksi dengan Teks Dinamis --}}
        <div class="mt-6">
            <button wire:click="tampilkanPersyaratan" class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-base font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 disabled:bg-indigo-400 disabled:cursor-not-allowed" @if(!$selectedPerizinan) disabled @endif>
                <i class="fas fa-search mr-2"></i> 
                @if ($mode === 'syarat')
                    Tampilkan Persyaratan
                @else
                    Tampilkan Cara Mendaftar
                @endif
            </button>
        </div>
    </div>

    {{-- Modal / Popup dengan Konten Dinamis --}}
    @if ($showModal && $detailPerizinan)
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 p-4" x-data="{ show: @entangle('showModal') }" x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-2/3 lg:w-1/2 max-h-[90vh] flex flex-col" @click.away="show = false">
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">{{ $detailPerizinan->name }}</h3>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
            </div>
            <div class="p-6 overflow-y-auto">
                {{-- Urutan konten diubah berdasarkan mode --}}
                @if ($mode === 'cara_daftar')
                    {{-- Mode Cara Daftar: Tampilkan Cara Mendaftar lebih dulu --}}
                    <div class="mb-6">
                        <h4 class="font-bold text-gray-700 mb-2">Cara Mendaftar</h4>
                        <article class="prose prose-sm max-w-none text-gray-600">{!! $detailPerizinan->how_to_register ?: '<p>-</p>' !!}</article>
                    </div>
                    <!-- <div class="mb-6">
                        <h4 class="font-bold text-gray-700 mb-2">Persyaratan</h4>
                        <article class="prose prose-sm max-w-none text-gray-600">{!! $detailPerizinan->requirements ?: '<p>-</p>' !!}</article>
                    </div> -->
                @else
                    {{-- Mode Syarat (default): Tampilkan Persyaratan lebih dulu --}}
                    <div class="mb-6">
                        <h4 class="font-bold text-gray-700 mb-2">Persyaratan</h4>
                        <article class="prose prose-sm max-w-none text-gray-600">{!! $detailPerizinan->requirements ?: '<p>-</p>' !!}</article>
                    </div>
                    <!-- <div class="mb-6">
                        <h4 class="font-bold text-gray-700 mb-2">Cara Mendaftar</h4>
                        <article class="prose prose-sm max-w-none text-gray-600">{!! $detailPerizinan->how_to_register ?: '<p>-</p>' !!}</article>
                    </div> -->
                @endif
                <div class="grid grid-cols-2 gap-4 pt-4 border-t mt-6">
                    <div>
                        <h4 class="font-bold text-gray-700 mb-2">Lama Proses</h4>
                        <p class="text-gray-600">{{ $detailPerizinan->processing_time ?: '-' }}</p>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-700 mb-2">Biaya</h4>
                        <p class="text-gray-600">{{ $detailPerizinan->fee ? 'Rp ' . number_format(floatval($detailPerizinan->fee), 0, ',', '.') : 'Gratis' }}</p>
                    </div>
                </div>
            </div>
            <div class="p-4 border-t bg-gray-50 text-right rounded-b-lg">
                <button wire:click="closeModal" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Tutup</button>
            </div>
        </div>
    </div>
    @endif
</div>