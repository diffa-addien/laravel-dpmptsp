@extends('layouts.front')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Peluang Investasi</h1>
            <p class="text-lg text-gray-600 mt-2">Jelajahi potensi dan peluang investasi di Kabupaten Halmahera Timur.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse ($investments as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden flex flex-col">
                    <a href="{{ route('investasi.show', $item->slug) }}">
                        <img src="{{ $item->getFirstMediaUrl('investment_image') ?: 'https://via.placeholder.com/400x250' }}" alt="{{ $item->title }}" class="w-full h-48 object-cover">
                    </a>
                    <div class="p-6 flex flex-col flex-grow">
                        <h2 class="text-lg font-bold text-gray-800 mb-2 flex-grow">
                            <a href="{{ route('investasi.show', $item->slug) }}" class="hover:text-indigo-600">
                                {{ Str::limit($item->title, 60) }}
                            </a>
                        </h2>
                        <a href="{{ route('investasi.show', $item->slug) }}" class="text-indigo-600 hover:text-indigo-800 font-semibold self-start">
                            Lihat Detail &rarr;
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white rounded-lg shadow-md p-8 text-center text-gray-500">
                    <p>Saat ini belum ada data peluang investasi yang dipublikasikan.</p>
                </div>
            @endforelse
        </div>

        <div class="mt-12">
            {{ $investments->links() }}
        </div>
    </div>
</div>
@endsection