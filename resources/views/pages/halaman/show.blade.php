@extends('layouts.front')

@section('content')
<div class="bg-white py-16">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            {{-- Judul Halaman --}}
            <div class="text-center border-b pb-6 mb-8">
                <h1 class="text-4xl font-bold text-gray-800">{{ $halaman->title }}</h1>
            </div>

            {{-- Isi Konten dari Rich Editor --}}
            <article class="prose max-w-none lg:prose-lg text-gray-700">
                {!! $halaman->content !!}
            </article>
        </div>
    </div>
</div>
@endsection