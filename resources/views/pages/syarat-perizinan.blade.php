@extends('layouts.front')

@section('content')
    <div class="py-12 bg-gray-100">
        <div class="container mx-auto">
            {{-- Memuat komponen livewire dengan mode 'syarat' --}}
            @livewire('syarat-perizinan', ['mode' => 'syarat'])
        </div>
    </div>
@endsection