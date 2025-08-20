<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DPMPTSP Halmahera Timur</title>

    <script src="https://cdn.tailwindcss.com?plugins=typography,aspect-ratio"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('head')
    @livewireStyles
</head>
<body class="bg-gray-100 font-sans">

    {{-- ====================================================================== --}}
    {{-- NAVBAR FINAL DENGAN PERBAIKAN UX DELAY --}}
    {{-- ====================================================================== --}}
    <nav x-data="{ open: false }" class="bg-gray-800 shadow-lg sticky top-0 z-50 text-gray-400">
        <div class="container mx-auto px-6 text-md">
            <div class="flex justify-between items-center py-3">
                <a class="font-bold text-xl text-white" href="/">DPMPTSP HALTIM</a>

                {{-- Menu Desktop --}}
                <div class="hidden md:flex items-center space-x-2">
                    <a href="/" class="flex items-center py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                        <i class="fas fa-house fa-fw mr-2"></i> Beranda
                    </a>

                    <div x-data="{ dropdownOpen: false, timeout: null }" @mouseenter="clearTimeout(timeout); dropdownOpen = true" @mouseleave="timeout = setTimeout(() => { dropdownOpen = false }, 200)" class="relative">
                        <button class="flex items-center w-full py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                            <i class="fas fa-building fa-fw mr-2"></i> Profile <i class="fas fa-chevron-down text-xs ml-2"></i>
                        </button>
                        <div x-show="dropdownOpen" class="absolute left-0 mt-2 py-2 w-48 bg-gray-700 rounded-md shadow-xl z-20" style="display: none;">
                           <a href="{{ route('halaman.show', ['slug' => 'sejarah-singkat']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Sejarah Singkat</a>
                            <a href="{{ route('halaman.show', ['slug' => 'visi-misi-dan-moto']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Visi, Misi dan Moto</a>
                            <a href="{{ route('halaman.show', ['slug' => 'tupoksi']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Tupoksi</a>
                            <a href="{{ route('halaman.show', ['slug' => 'maklumat-layanan']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Maklumat Layanan</a>
                            <a href="{{ route('sdm') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Struktur Organisasi</a>
                            <a href="{{ route('sdm') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Sumberdaya Manusia</a>
                            <a href="{{ route('halaman.show', ['slug' => 'sarana-dan-prasarana']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Sarana dan Prasarana</a>
                            <a href="{{ route('halaman.show', ['slug' => 'penghargaan-dan-prestasi']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Penghargaan & Prestasi</a>
                            <a href="{{ route('halaman.show', ['slug' => 'inovasi']) }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Inovasi</a>
                        </div>
                    </div>

                    <div x-data="{ dropdownOpen: false, timeout: null }" @mouseenter="clearTimeout(timeout); dropdownOpen = true" @mouseleave="timeout = setTimeout(() => { dropdownOpen = false }, 200)" class="relative">
                        <button class="flex items-center w-full py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                            <i class="fas fa-file-signature fa-fw mr-2"></i> Perizinan <i class="fas fa-chevron-down text-xs ml-2"></i>
                        </button>
                        <div x-show="dropdownOpen" class="absolute left-0 mt-2 py-2 w-48 bg-gray-700 rounded-md shadow-xl z-20" style="display: none;">

                <a href="{{ route('perizinan.daftar') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Jenis Izin dan Non Izin</a>
                            <a href="{{ route('syarat-perizinan') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Syarat Izin dan Non Izin</a>
                            <a href="{{ route('cara-mendaftar') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Cara Permohonan Izin</a>
                        </div>
                    </div>

                    <a href="{{ route('investasi.index') }}" class="flex items-center py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                        <i class="fas fa-chart-line fa-fw mr-2"></i> Investasi
                    </a>

                    <div x-data="{ dropdownOpen: false, timeout: null }" @mouseenter="clearTimeout(timeout); dropdownOpen = true" @mouseleave="timeout = setTimeout(() => { dropdownOpen = false }, 200)" class="relative">
                        <button class="flex items-center w-full py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                            <i class="fas fa-circle-info fa-fw mr-2"></i> Informasi Publik <i class="fas fa-chevron-down text-xs ml-2"></i>
                        </button>
                        <div x-show="dropdownOpen" class="absolute left-0 mt-2 py-2 w-48 bg-gray-700 rounded-md shadow-xl z-20" style="display: none;">
                            <a href="{{ route('berita.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Berita</a>
                            <a href="{{ route('galeri.index') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Galeri</a>
                            <a href="{{ route('faq') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">FAQ</a>
                        </div>
                    </div>

                    <a href="#" class="flex items-center py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                        <i class="fas fa-file-invoice-dollar fa-fw mr-2"></i> LKPM
                    </a>

                    <div x-data="{ dropdownOpen: false, timeout: null }" @mouseenter="clearTimeout(timeout); dropdownOpen = true" @mouseleave="timeout = setTimeout(() => { dropdownOpen = false }, 200)" class="relative">
                        <button class="flex items-center w-full py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors">
                            <i class="fas fa-headset fa-fw mr-2"></i> Hubungi Kami <i class="fas fa-chevron-down text-xs ml-2"></i>
                        </button>
                        <div x-show="dropdownOpen" class="absolute right-0 mt-2 py-2 w-48 bg-gray-700 rounded-md shadow-xl z-20" style="display: none;">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Informasi Kontak</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Layanan Pengaduan</a>
                        </div>
                    </div>
                </div>

                {{-- Tombol Menu Mobile --}}
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="outline-none mobile-menu-button">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            {{-- MENU MOBILE --}}
            <div x-show="open" class="md:hidden py-2 space-y-2">
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="/">Beranda</a>
                <h3 class="px-3 pt-2 text-xs text-gray-400 uppercase font-bold">Profile</h3>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('sdm') }}">Struktur Organisasi</a>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('halaman.show', ['slug' => 'visi-misi']) }}">Visi & Misi</a>
                <h3 class="px-3 pt-2 text-xs text-gray-400 uppercase font-bold">Perizinan</h3>
                <a href="{{ route('perizinan.daftar') }}" class="block px-4 py-2 text-sm text-gray-300 hover:bg-gray-600 hover:text-white">Jenis Izin dan Non Izin</a>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('syarat-perizinan') }}">Cek Syarat Izin</a>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('cara-mendaftar') }}">Cek Cara Mendaftar</a>
                <h3 class="px-3 pt-2 text-xs text-gray-400 uppercase font-bold">Informasi Publik</h3>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('berita.index') }}">Berita</a>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('galeri.index') }}">Galeri</a>
                <a class="block py-2 px-3 hover:bg-gray-700 hover:text-white rounded-md transition-colors" href="{{ route('faq') }}">FAQ</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-6 pt-10 pb-6">
            <div class="flex flex-wrap -mx-4">
                <div class="w-full md:w-1/4 px-4 text-center md:text-left mb-8">
                    <h5 class="uppercase mb-6 font-bold">DPMPTSP HALTIM</h5>
                    <p class="text-gray-400">Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Halmahera Timur.</p>
                </div>
                <div class="w-full md:w-1/4 px-4 text-center md:text-left mb-8">
                    <h5 class="uppercase mb-6 font-bold">Tautan</h5>
                    <ul class="mb-4">
                        <li class="mt-2"><a href="{{ route('faq') }}" class="hover:underline text-gray-400">FAQ</a></li>
                        <li class="mt-2"><a href="#" class="hover:underline text-gray-400">Regulasi</a></li>
                        <li class="mt-2"><a href="#" class="hover:underline text-gray-400">Potensi Investasi</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 px-4 text-center md:text-left mb-8">
                    <h5 class="uppercase mb-6 font-bold">Kontak</h5>
                    <p class="text-gray-400"><i class="fa fa-map-marker-alt mr-2"></i> Jl. Pusat Pemerintahan, Kota Maba</p>
                    <p class="text-gray-400"><i class="fa fa-phone mr-2"></i> (0123) 456-7890</p>
                    <p class="text-gray-400"><i class="fa fa-envelope mr-2"></i> info@dpmptsp-haltim.go.id</p>
                </div>
                <div class="w-full md:w-1/4 px-4 mb-8">
                    <h5 class="uppercase mb-6 font-bold text-center md:text-left">Pengunjung</h5>
                    <div class="bg-gray-700/50 rounded-lg p-4 space-y-2 text-sm">
                        <div class="flex justify-between items-center"><span class="flex items-center text-gray-300"><i class="far fa-eye w-5 mr-2"></i> Hari ini</span><span class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['today'] }}</span></div>
                        <div class="flex justify-between items-center"><span class="flex items-center text-gray-300"><i class="far fa-eye w-5 mr-2"></i> Minggu ini</span><span class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['this_week'] }}</span></div>
                        <div class="flex justify-between items-center"><span class="flex items-center text-gray-300"><i class="far fa-eye w-5 mr-2"></i> Bulan ini</span><span class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['this_month'] }}</span></div>
                        <div class="flex justify-between items-center"><span class="flex items-center text-gray-300"><i class="far fa-eye w-5 mr-2"></i> Tahun ini</span><span class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['this_year'] }}</span></div>
                        <div class="flex justify-between items-center"><span class="flex items-center text-gray-300"><i class="far fa-eye w-5 mr-2"></i> Total</span><span class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['total'] }}</span></div>
                    </div>
                </div>
            </div>
            <hr class="border-gray-700 my-6">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} DPMPTSP Kabupaten Halmahera Timur. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    @yield('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @livewireScripts
    <script>
        // Fungsi untuk melacak pengunjung unik harian
        function trackUniqueVisitor() {
            const today = new Date().toISOString().slice(0, 10);
            const lastVisitDate = localStorage.getItem('lastVisitDate');
            if (!lastVisitDate || lastVisitDate !== today) {
                fetch('/api/ping-visit', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
                }).then(response => { if(response.ok) { localStorage.setItem('lastVisitDate', today); }
                }).catch(error => console.error('Gagal mencatat kunjungan:', error));
            }
        }
        document.addEventListener('DOMContentLoaded', trackUniqueVisitor);
    </script>
</body>
</html>