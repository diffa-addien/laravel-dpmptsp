@extends('layouts.front')

@section('content')
<div class="py-16">
    <div class="container mx-auto px-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-white p-8 rounded-lg shadow-md">
                <h1 class="text-3xl md:text-4xl font-bold text-gray-800 mb-6">{{ $investment->title }}</h1>
                <img src="{{ $investment->getFirstMediaUrl('investment_image') }}" alt="{{ $investment->title }}" class="w-full rounded-lg shadow mb-6">
                <article class="prose max-w-none text-gray-700">
                    {!! $investment->description !!}
                </article>
            </div>
        </div>
    </div>
</div>
@endsection