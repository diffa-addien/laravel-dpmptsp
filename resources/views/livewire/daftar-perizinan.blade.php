<div>
    <div class="bg-gray-100 py-16">
        <div class="container mx-auto px-6">
            {{-- Judul Halaman --}}
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold text-gray-800">Daftar Kategori Perizinan</h1>
                <p class="text-lg text-gray-600 mt-2">Pilih kategori untuk melihat jenis-jenis izin yang tersedia.</p>
            </div>

            {{-- Grid Kartu Kategori --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @forelse ($kategoriList as $kategori)
                    <button wire:click="showListPerizinan({{ $kategori->id }})" class="relative bg-indigo-500 text-white text-left p-6 rounded-md shadow-md hover:bg-indigo-600 hover:shadow-lg transform hover:-translate-y-1 transition-all duration-300">
                        <span class="absolute top-2 left-3 bg-red-600 text-white text-xs font-bold w-6 h-6 flex items-center justify-center rounded-full">{{ $loop->iteration }}</span>
                        <div class="mt-4">
                            <h3 class="font-bold text-lg">{{ $kategori->name }}</h3>
                            <p class="text-sm text-indigo-200 mt-1">{{ $kategori->perizinans_count }} Jenis Izin</p>
                        </div>
                    </button>
                @empty
                    <div class="col-span-full bg-white rounded-lg shadow-md p-8 text-center text-gray-500">
                        <p>Belum ada kategori perizinan yang tersedia.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Modal / Popup Daftar Izin --}}
    @if ($showModal && $selectedKategori)
    <div class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center z-50 p-4" x-data="{ show: @entangle('showModal') }" x-show="show" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="bg-white rounded-lg shadow-xl w-11/12 md:w-2/3 lg:w-1/2 max-h-[90vh] flex flex-col" @click.away="show = false">
            {{-- Header Modal --}}
            <div class="p-4 border-b flex justify-between items-center">
                <h3 class="text-xl font-semibold text-gray-800">Daftar Izin: {{ $selectedKategori->name }}</h3>
                <button wire:click="closeModal" class="text-gray-400 hover:text-gray-600 text-2xl leading-none">&times;</button>
            </div>
            {{-- Body Modal (List Izin) --}}
            <div class="p-6 overflow-y-auto">
                <ul class="space-y-3">
                    @forelse ($selectedKategori->perizinans as $perizinan)
                        <li>
                            <a class="block p-3 bg-gray-50 rounded-md hover:bg-indigo-50 border border-gray-200 hover:border-indigo-400 transition-colors duration-300">
                                <p class="font-semibold text-indigo-700">{{ $perizinan->name }}</p>
                            </a>
                        </li>
                    @empty
                        <li class="text-center text-gray-500 p-4">
                            Belum ada jenis izin yang terdaftar untuk kategori ini.
                        </li>
                    @endforelse
                </ul>
            </div>
             {{-- Footer Modal --}}
            <div class="p-4 border-t bg-gray-50 text-right rounded-b-lg">
                <button wire:click="closeModal" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300">Tutup</button>
            </div>
        </div>
    </div>
    @endif
</div>