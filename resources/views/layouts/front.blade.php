<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>DPMPTSP Halmahera Timur</title>

    <script src="https://cdn.tailwindcss.com?plugins=typography,aspect-ratio"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('head')
    @livewireStyles
</head>

<body class="bg-gray-50 font-sans">

    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center">
                {{-- <img src="/path/to/logo.png" alt="Logo" class="h-10 w-10 mr-2"> --}}
                <a class="font-bold text-xl text-gray-800" href="/">
                    DPMPTSP HALTIM
                </a>
            </div>
            <div class="hidden md:flex items-center space-x-6">
                <a class="py-2 px-3 text-gray-600 hover:text-indigo-600" href="/">Beranda</a>
                <a class="py-2 px-3 text-gray-600 hover:text-indigo-600" href="#">Profil</a>
                <a class="py-2 px-3 text-gray-600 hover:text-indigo-600" href="#">Layanan</a>
                <a class="py-2 px-3 text-gray-600 hover:text-indigo-600" href="#">Informasi</a>
                <a class="py-2 px-3 text-gray-600 hover:text-indigo-600" href="#">Galeri</a>
                <a class="py-2 px-3 text-gray-600 hover:text-indigo-600" href="#">Kontak</a>
            </div>
            <div class="md:hidden flex items-center">
                <button class="outline-none mobile-menu-button">
                    <svg class=" w-6 h-6 text-gray-500 hover:text-indigo-600 " x-show="!showMenu" fill="none"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white mt-16">
        <div class="container mx-auto px-6 pt-10 pb-6">
            <div class="flex flex-wrap">
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">DPMPTSP HALTIM</h5>
                    <p>Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu Kabupaten Halmahera Timur.</p>
                </div>
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Tautan</h5>
                    <ul class="mb-4">
                        <li class="mt-2"><a href="#" class="hover:underline">FAQ</a></li>
                        <li class="mt-2"><a href="#" class="hover:underline">Regulasi</a></li>
                        <li class="mt-2"><a href="#" class="hover:underline">Potensi Investasi</a></li>
                    </ul>
                </div>
                <div class="w-full md:w-1/4 text-center md:text-left">
                    <h5 class="uppercase mb-6 font-bold">Kontak</h5>
                    <p><i class="fa fa-map-marker-alt mr-2"></i> Jl. Pusat Pemerintahan, Kota Maba</p>
                    <p><i class="fa fa-phone mr-2"></i> (0123) 456-7890</p>
                    <p><i class="fa fa-envelope mr-2"></i> info@dpmptsp-haltim.go.id</p>
                </div>
                <div class="max-w-md mx-auto mb-8">
                    <h3 class="text-xl font-bold text-center uppercase tracking-wider mb-4">Pengunjung</h3>
                    <div class="bg-gray-700/50 rounded-lg p-4 space-y-2 text-sm">
                        {{-- Hari Ini --}}
                        <div class="flex justify-between items-center">
                            <span class="flex items-center text-gray-300">
                                <i class="far fa-eye w-5 mr-2"></i> Hari ini
                            </span>
                            <span
                                class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['today'] }}</span>
                        </div>
                        {{-- Minggu Ini --}}
                        <div class="flex justify-between items-center">
                            <span class="flex items-center text-gray-300">
                                <i class="far fa-eye w-5 mr-2"></i> Minggu ini
                            </span>
                            <span
                                class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['this_week'] }}</span>
                        </div>
                        {{-- Bulan Ini --}}
                        <div class="flex justify-between items-center">
                            <span class="flex items-center text-gray-300">
                                <i class="far fa-eye w-5 mr-2"></i> Bulan ini
                            </span>
                            <span
                                class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['this_month'] }}</span>
                        </div>
                        {{-- Tahun Ini --}}
                        <div class="flex justify-between items-center">
                            <span class="flex items-center text-gray-300">
                                <i class="far fa-eye w-5 mr-2"></i> Tahun ini
                            </span>
                            <span
                                class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['this_year'] }}</span>
                        </div>
                        {{-- Total --}}
                        <div class="flex justify-between items-center">
                            <span class="flex items-center text-gray-300">
                                <i class="far fa-eye w-5 mr-2"></i> Total
                            </span>
                            <span
                                class="font-bold bg-blue-500 text-white px-2 py-0.5 rounded-full">{{ $visitorStats['total'] }}</span>
                        </div>
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
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> {{-- <-- TAMBAHKAN INI
        --}} @livewireScripts <script>
        // Fungsi untuk melacak pengunjung unik harian
        function trackUniqueVisitor() {
        // 1. Dapatkan tanggal hari ini dalam format YYYY-MM-DD
        const today = new Date().toISOString().slice(0, 10);

        // 2. Ambil tanggal kunjungan terakhir dari penyimpanan lokal browser
        const lastVisitDate = localStorage.getItem('lastVisitDate');

        // 3. Jika belum pernah ada catatan, ATAU catatannya bukan untuk hari ini
        if (!lastVisitDate || lastVisitDate !== today) {
        // Ini adalah pengunjung unik untuk hari ini

        // 4. Kirim permintaan 'ping' ke server kita
        fetch('/api/ping-visit', {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
        })
        .then(response => {
        if(response.ok) {
        // 5. Jika server berhasil, simpan tanggal hari ini di browser
        // agar tidak mengirim ping lagi sampai besok.
        localStorage.setItem('lastVisitDate', today);
        console.log('Kunjungan unik hari ini berhasil dicatat.');
        }
        })
        .catch(error => console.error('Gagal mencatat kunjungan:', error));
        }
        }

        // 6. Jalankan fungsi di atas saat halaman selesai dimuat
        document.addEventListener('DOMContentLoaded', trackUniqueVisitor);
        </script>
</body>

</html>