<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DPMPTSP Halmahera Timur</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @yield('head')
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
                <svg class=" w-6 h-6 text-gray-500 hover:text-indigo-600 "
                    x-show="!showMenu"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
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
            </div>
            <hr class="border-gray-700 my-6">
            <div class="text-center">
                <p>&copy; {{ date('Y') }} DPMPTSP Kabupaten Halmahera Timur. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    @yield('scripts')
</body>
</html>