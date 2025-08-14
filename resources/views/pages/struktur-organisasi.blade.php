@extends('layouts.front')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        {{-- Judul Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Struktur Organisasi</h1>
            <p class="text-lg text-gray-600 mt-2">Sumber Daya Manusia di DPMPTSP Kabupaten Halmahera Timur.</p>
        </div>

        {{-- Daftar Accordion SDM --}}
        <div class="max-w-5xl mx-auto space-y-4">
            @forelse ($sdmByGroup as $type => $members)
                {{-- Setiap item accordion dibungkus dengan x-data --}}
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="bg-white rounded-lg shadow-md">
                    {{-- Bagian Header Grup Jabatan (untuk diklik) --}}
                    <button @click="open = !open" class="w-full flex justify-between items-center text-left p-5 font-semibold text-gray-700 hover:bg-gray-50 rounded-t-lg focus:outline-none text-xl">
                        <span>{{ ucfirst($type) }}</span>
                        <i class="fas fa-chevron-down transform transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>
                    {{-- Bagian Konten (Daftar Orang) --}}
                    <div x-show="open" x-transition class="p-6 border-t">
                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($members as $person)
                                <div class="text-center">
                                    <img src="{{ $person->getFirstMediaUrl('sdm_photo') }}" alt="Foto {{ $person->name }}" class="w-32 h-32 rounded-full mx-auto mb-4 object-cover shadow-lg border-4 border-white">
                                    <h3 class="text-lg font-bold text-gray-800">{{ $person->name }}</h3>
                                    <p class="text-gray-500">{{ $person->position_name }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-8 text-center text-gray-500">
                    <p>Saat ini belum ada data SDM yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection