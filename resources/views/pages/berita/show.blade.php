@extends('layouts.front')

@section('content')
<div class="py-16">
    <div class="container mx-auto px-6">
        <div class="flex flex-wrap lg:flex-nowrap -mx-4">

            {{-- Konten Utama Berita --}}
            <main class="w-full lg:w-2/3 px-4">
                <article class="bg-white p-8 rounded-lg shadow-md">
                    {{-- Judul dan Meta --}}
                    <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ $berita->title }}</h1>
                    <div class="flex items-center text-sm text-gray-500 mb-6">
                        <span class="bg-indigo-100 text-indigo-800 px-2 py-1 rounded-full font-semibold">{{ $berita->category }}</span>
                        <span class="mx-2">&bull;</span>
                        <span>{{ $berita->published_at->translatedFormat('d F Y') }}</span>
                    </div>

                    {{-- Galeri Gambar --}}
                    <div class="mb-6 space-y-4">
                        @foreach ($berita->getMedia('berita_images') as $image)
                            <img src="{{ $image->getUrl() }}" alt="{{ $berita->title }}" class="w-full rounded-lg shadow">
                        @endforeach
                    </div>

                    {{-- Isi Konten --}}
                    <div class="prose max-w-none text-gray-700">
                        {!! $berita->content !!}
                    </div>
                </article>
            </main>

            {{-- Sidebar Berita Terbaru --}}
            <aside class="w-full lg:w-1/3 px-4 mt-12 lg:mt-0">
                <div class="bg-white p-6 rounded-lg shadow-md sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Berita Lainnya</h3>
                    <div class="space-y-4">
                        @forelse ($recentBerita as $item)
                            <a href="{{ route('berita.show', $item->slug) }}" class="block group">
                                <p class="font-semibold text-gray-700 group-hover:text-indigo-600">{{ $item->title }}</p>
                                <p class="text-sm text-gray-500">{{ $item->published_at->translatedFormat('d F Y') }}</p>
                            </a>
                        @empty
                            <p class="text-gray-500">Tidak ada berita lainnya.</p>
                        @endforelse
                    </div>
                </div>
            </aside>

        </div>
    </div>
</div>
@endsection