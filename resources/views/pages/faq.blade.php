@extends('layouts.front')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        {{-- Judul Halaman --}}
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Frequently Asked Questions (FAQ)</h1>
            <p class="text-lg text-gray-600 mt-2">Temukan jawaban atas pertanyaan yang paling sering diajukan.</p>
        </div>

        {{-- Daftar Accordion FAQ --}}
        <div class="max-w-3xl mx-auto space-y-4">
            @forelse ($faqs as $faq)
                {{-- Setiap item accordion dibungkus dengan x-data --}}
                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="bg-white rounded-lg shadow-md">
                    {{-- Bagian Pertanyaan (untuk diklik) --}}
                    <button @click="open = !open" class="w-full flex justify-between items-center text-left p-5 font-semibold text-gray-700 hover:bg-gray-50 rounded-t-lg focus:outline-none">
                        <span>{{ $faq->question }}</span>
                        {{-- Ikon panah yang berotasi --}}
                        <i class="fas fa-chevron-down transform transition-transform duration-300" :class="{ 'rotate-180': open }"></i>
                    </button>
                    {{-- Bagian Jawaban (muncul/hilang) --}}
                    <div x-show="open" x-transition class="p-5 border-t text-gray-600">
                        <article class="prose max-w-none">
                            {!! $faq->answer !!}
                        </article>
                    </div>
                </div>
            @empty
                <div class="bg-white rounded-lg shadow-md p-8 text-center text-gray-500">
                    <p>Saat ini belum ada data FAQ yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</div>
@endsection