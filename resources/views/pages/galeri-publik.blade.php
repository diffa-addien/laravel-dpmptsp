@extends('layouts.front')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        {{-- Judul Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Galeri Foto Kegiatan</h1>
            <p class="text-lg text-gray-600 mt-2">Dokumentasi visual dari berbagai kegiatan yang telah kami publikasikan.</p>
        </div>

        {{-- Grid Foto Galeri --}}
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
            @forelse ($beritasWithMedia as $berita)
                {{-- Loop untuk setiap gambar di dalam satu berita --}}
                @foreach ($berita->getMedia('berita_images') as $image)
                    <a href="{{ $image->getUrl() }}" target="_blank" class="block rounded-lg overflow-hidden group relative">
                        {{-- Gambar --}}
                        <img src="{{ $image->getUrl() }}" alt="{{ $berita->title }}" class="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300">
                        {{-- Overlay saat hover --}}
                        <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 transition-all duration-300 flex items-center justify-center">
                            <i class="fas fa-search-plus text-white text-2xl opacity-0 group-hover:opacity-100 transition-opacity"></i>
                        </div>
                    </a>
                @endforeach
            @empty
                <div class="col-span-full bg-white rounded-lg shadow-md p-8 text-center text-gray-500">
                    <p>Saat ini belum ada foto di galeri.</p>
                </div>
            @endforelse
        </div>

        {{-- Pagination Links --}}
        <div class="mt-12">
            {{ $beritasWithMedia->links() }}
        </div>
    </div>
</div>
@endsection