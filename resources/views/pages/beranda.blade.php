@extends('layouts.front')

@section('content')

  <section class="bg-cover bg-center h-96 text-white flex items-center justify-center"
    style="background-image: url('https://images.unsplash.com/photo-1521737604893-d14cc237f11d?q=80&w=2084&auto=format&fit=crop')">
    <div class="bg-black bg-opacity-50 p-10 rounded-lg text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">DPMPTSP Halmahera Timur</h1>
    <p class="text-xl">Mewujudkan Pelayanan Publik yang Prima dan Pro Investasi</p>
    </div>
  </section>

  <section class="mb-16 -mt-14">
    <div class="container mx-auto px-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
      <a href="{{ route('syarat-perizinan') }}"
      class="bg-purple-600 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-purple-700 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">IZIN</span>
        <span class="text-sm">PERSYARATAN</span>
      </div>
      <i class="fas fa-file-lines fa-3x text-white/50"></i>
      </a>
      <a href="{{ route('cara-mendaftar') }}"
      class="bg-red-500 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-red-600 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">DAFTAR</span>
        <span class="text-sm">PENDAFTARAN ONLINE</span>
      </div>
      <i class="fas fa-edit fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-green-500 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-green-600 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">BERKAS</span>
        <span class="text-sm">STATUS BERKAS</span>
      </div>
      <i class="fas fa-hand-pointer fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-blue-800 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-blue-900 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">ADUAN</span>
        <span class="text-sm">LAYANAN PENGADUAN</span>
      </div>
      <i class="fas fa-question-circle fa-3x text-white/50"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
      <a href="https://www.lapor.go.id/" target="_blank"
      class="bg-indigo-500 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-indigo-600 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">SP4N - LAPOR</span>
        <span class="text-sm">PENGADUAN NASIONAL</span>
      </div>
      <i class="fas fa-desktop fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-teal-500 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-teal-600 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">REKAPITULASI</span>
        <span class="text-sm">REKAPITULASI IZIN</span>
      </div>
      <i class="fas fa-chart-bar fa-3x text-white/50"></i>
      </a>
      <a href="{{ route('berita.index') }}"
      class="bg-orange-500 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-orange-600 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">BERITA</span>
        <span class="text-sm">INFORMASI PUBLIK</span>
      </div>
      <i class="fas fa-newspaper fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-pink-700 text-white p-6 rounded-lg shadow-lg flex justify-between items-center hover:bg-pink-800 transition-colors duration-300">
      <div>
        <span class="font-bold text-2xl block">SURVEY</span>
        <span class="text-sm">INDEKS KEPUASAN</span>
      </div>
      <span class="font-extrabold text-4xl">98,8</span>
      </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
      <a href="{{ route('faq') }}"
      class="bg-white rounded-lg shadow p-4 text-center hover:shadow-xl hover:-translate-y-1 transform transition-all duration-300">
      <i class="fas fa-comments fa-2x text-green-500"></i>
      <span class="mt-2 block font-semibold text-gray-600 text-sm">FAQ</span>
      </a>
      <a href="{{ route('halaman.show', ['slug' => 'janji-layanan']) }}"
      class="bg-white rounded-lg shadow p-4 text-center hover:shadow-xl hover:-translate-y-1 transform transition-all duration-300">
      <i class="fas fa-handshake fa-2x text-green-500"></i>
      <span class="mt-2 block font-semibold text-gray-600 text-sm">JANJI LAYANAN</span>
      </a>
      <a href="#"
      class="bg-white rounded-lg shadow p-4 text-center hover:shadow-xl hover:-translate-y-1 transform transition-all duration-300">
      <i class="fas fa-quote-right fa-2x text-green-500"></i>
      <span class="mt-2 block font-semibold text-gray-600 text-sm">VERIFIKASI SK</span>
      </a>
      <a href="{{ route('sdm') }}"
      class="bg-white rounded-lg shadow p-4 text-center hover:shadow-xl hover:-translate-y-1 transform transition-all duration-300">
      <i class="fas fa-user-tie fa-2x text-green-500"></i>
      <span class="mt-2 block font-semibold text-gray-600 text-sm">SDM</span>
      </a>
      <a href="{{ route('halaman.show', ['slug' => 'alur-perizinan']) }}"
      class="bg-white rounded-lg shadow p-4 text-center hover:shadow-xl hover:-translate-y-1 transform transition-all duration-300">
      <i class="fas fa-arrows-spin fa-2x text-green-500"></i>
      <span class="mt-2 block font-semibold text-gray-600 text-sm">ALUR PERIZINAN</span>
      </a>
      <a href="#"
      class="bg-white rounded-lg shadow p-4 text-center hover:shadow-xl hover:-translate-y-1 transform transition-all duration-300">
      <i class="fas fa-cogs fa-2x text-green-500"></i>
      <span class="mt-2 block font-semibold text-gray-600 text-sm">PENGADUAN</span>
      </a>
    </div>
    </div>
  </section>

  <div class="container mx-auto px-6 py-12">
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-16 items-start">
    <div>
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Profil & Informasi</h2>
      <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden shadow-lg">
      <iframe class="w-full h-full" src="https://www.youtube.com/embed/LBE90Ck5M40" title="YouTube video player"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
      </div>
    </div>
    <div>
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Berita Terbaru</h2>
      <div class="h-[320px] md:h-[350px] lg:h-full max-h-[415px] space-y-4 pr-2 overflow-y-auto">
      @forelse ($latestBerita as $berita)
      <a href="#" class="block bg-white p-4 rounded-lg shadow hover:bg-gray-50 transition">
      <p class="font-semibold text-gray-700">{{ $berita->title }}</p>
      <p class="text-sm text-gray-500">Dipublikasikan pada
      {{ \Carbon\Carbon::parse($berita->published_at)->translatedFormat('d F Y') }}
      </p>
      </a>
    @empty
      <div class="bg-white p-4 rounded-lg shadow text-center text-gray-500">
      Belum ada berita untuk ditampilkan.
      </div>
    @endforelse
      </div>
    </div>
    </section>

    @if(!empty($galleryImages))
    <section>
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold text-gray-800">Galeri Kegiatan</h2>
      <p class="text-gray-600">Dokumentasi kegiatan dan acara DPMPTSP.</p>
    </div>
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
      @foreach ($galleryImages as $image)
      <div class="h-48 bg-gray-300 rounded-lg overflow-hidden">
      <img src="{{ $image->getUrl() }}" alt="Galeri Kegiatan" class="w-full h-full object-cover">
      </div>
    @endforeach
    </div>
    </section>
    @endif
  </div>
@endsection