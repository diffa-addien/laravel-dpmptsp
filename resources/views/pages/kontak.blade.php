@extends('layouts.front')

@section('content')
<div class="py-16 bg-gray-100">
    <div class="container mx-auto px-6">
        {{-- Judul Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Hubungi Kami</h1>
            <p class="text-lg text-gray-600 mt-2">Kami siap melayani dan menjawab pertanyaan Anda.</p>
        </div>

        <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2">

                {{-- Kolom Kiri: Informasi Kontak --}}
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6">Informasi Kontak</h2>

                    {{-- Alamat --}}
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 w-10 text-center">
                            <i class="fas fa-map-marker-alt text-2xl text-indigo-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Alamat Kantor</h3>
                            <p class="text-gray-600 mt-1">{{ $profilDinas->address }}</p>
                        </div>
                    </div>

                    {{-- Telepon & Email --}}
                    <div class="flex items-start mb-6">
                        <div class="flex-shrink-0 w-10 text-center">
                            <i class="fas fa-phone-alt text-2xl text-indigo-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Telepon & Email</h3>
                            <p class="text-gray-600 mt-1">{{ $profilDinas->phone }}</p>
                            <p class="text-gray-600 mt-1">{{ $profilDinas->email }}</p>
                        </div>
                    </div>

                    {{-- Media Sosial --}}
                    <div class="flex items-start">
                        <div class="flex-shrink-0 w-10 text-center">
                            <i class="fas fa-share-alt text-2xl text-indigo-600"></i>
                        </div>
                        <div class="ml-4">
                            <h3 class="text-lg font-semibold text-gray-700">Media Sosial</h3>
                            <div class="flex space-x-4 mt-2">
                                @if($profilDinas->facebook_url)
                                    <a href="{{ $profilDinas->facebook_url }}" target="_blank" class="text-gray-500 hover:text-blue-600 text-2xl"><i class="fab fa-facebook-square"></i></a>
                                @endif
                                @if($profilDinas->instagram_url)
                                    <a href="{{ $profilDinas->instagram_url }}" target="_blank" class="text-gray-500 hover:text-pink-600 text-2xl"><i class="fab fa-instagram-square"></i></a>
                                @endif
                                @if($profilDinas->twitter_url)
                                    <a href="{{ $profilDinas->twitter_url }}" target="_blank" class="text-gray-500 hover:text-blue-400 text-2xl"><i class="fab fa-twitter-square"></i></a>
                                @endif
                                @if($profilDinas->youtube_url)
                                    <a href="{{ $profilDinas->youtube_url }}" target="_blank" class="text-gray-500 hover:text-red-600 text-2xl"><i class="fab fa-youtube-square"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Kolom Kanan: Peta Google Maps --}}
                <div class="w-full h-80 md:h-full">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.4071261413737!2d106.79038467499356!3d-6.596217293397556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c5b7c0952019%3A0x48bf6e2eafdb48ae!2sDinas%20Penanaman%20Modal%20dan%20Pelayanan%20Terpadu%20Satu%20Pintu%20Kota%20Bogor!5e0!3m2!1sid!2sid!4v1755774823267!5m2!1sid!2sid"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection