@extends('layouts.front')

@section('content')
<div class="bg-gray-100 py-16">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Dokumen Perencanaan</h1>
            <p class="text-lg text-gray-600 mt-2">Daftar dokumen perencanaan, laporan, dan sejenisnya.</p>
        </div>

        {{-- Memanggil komponen tabel yang sama dan mengirimkan data $dokumens --}}
        <x-dokumen-table :dokumens="$dokumens" />

    </div>
</div>
@endsection