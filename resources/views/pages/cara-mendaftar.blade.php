@extends('layouts.front')

@section('content')
    <div class="py-12 bg-gray-100">
        <div class="container mx-auto">
            {{-- Memuat komponen livewire yang SAMA, tapi dengan mode 'cara_daftar' --}}
            @livewire('syarat-perizinan', ['mode' => 'cara_daftar'])
        </div>
    </div>
@endsection