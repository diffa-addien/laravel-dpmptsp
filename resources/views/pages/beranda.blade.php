@extends('layouts.front')

@section('content')

{{-- ====================================================================== --}}
{{-- STRUKTUR DIUBAH: Satu container utama untuk semua konten --}}
{{-- ====================================================================== --}}
<div class="container mx-auto px-6 py-8">

  {{-- Slider sekarang di dalam container, class 'max-w-7xl' dan 'mx-auto' dihapus --}}
  @if($sliders->isNotEmpty())
    <section class="relative w-full h-56 md:h-80 lg:h-[500px] rounded-0 overflow-hidden shadow-lg mb-6" x-data="{ 
      activeSlide: 1, 
      totalSlides: {{ $sliders->count() }},
      autoplay() {
        setInterval(() => { 
        this.activeSlide = this.activeSlide === this.totalSlides ? 1 : this.activeSlide + 1 
        }, 5000);
      }
      }" x-init="autoplay()">

    @foreach($sliders as $slider)
    <div x-show="activeSlide === {{ $loop->iteration }}" x-transition:enter="transition ease-in-out duration-1000"
    x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in-out duration-1000" x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0" class="absolute inset-0">
      <img src="{{ $slider->getFirstMediaUrl('slider_image') }}" alt="Slider Image {{ $loop->iteration }}" class="w-full h-full object-cover">
    </div>
    @endforeach

    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-3">
    @foreach($sliders as $slider)
    <button @click="activeSlide = {{ $loop->iteration }}" class="w-3 h-3 rounded-full transition-colors"
      :class="{ 'bg-white shadow': activeSlide === {{ $loop->iteration }}, 'bg-white/50 hover:bg-white': activeSlide !== {{ $loop->iteration }} }">
    </button>
    @endforeach
    </div>
    </section>
  @endif


  {{-- Section layanan sekarang berada di dalam container yang sama --}}
  <section class="mb-16">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 mb-3">
      <a href="{{ route('syarat-perizinan') }}"
      class="bg-purple-600 text-white px-6 py-10 rounded-sm shadow-md flex justify-between items-center hover:bg-purple-700 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">IZIN</span><span class="text-sm">PERSYARATAN</span></div><i class="fas fa-file-lines fa-3x text-white/50"></i>
      </a>
      <a href="{{ route('cara-mendaftar') }}"
      class="bg-red-500 text-white p-6 rounded-sm shadow-md flex justify-between items-center hover:bg-red-600 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">DAFTAR</span><span class="text-sm">Cara Pendaftaran</span></div><i class="fas fa-edit fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-green-500 text-white p-6 rounded-sm shadow-md flex justify-between items-center hover:bg-green-600 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">BERKAS</span><span class="text-sm">STATUS BERKAS</span></div><i class="fas fa-hand-pointer fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-blue-800 text-white p-6 rounded-sm shadow-md flex justify-between items-center hover:bg-blue-900 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">ADUAN</span><span class="text-sm">LAYANAN PENGADUAN</span></div><i class="fas fa-question-circle fa-3x text-white/50"></i>
      </a>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-2 mb-8">
      <a href="https://www.lapor.go.id/" target="_blank"
      class="bg-indigo-500 text-white px-6 py-10  rounded-sm shadow-md flex justify-between items-center hover:bg-indigo-600 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">SP4N - LAPOR</span><span class="text-sm">PENGADUAN NASIONAL</span></div><i class="fas fa-desktop fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-teal-500 text-white p-6 rounded-sm shadow-md flex justify-between items-center hover:bg-teal-600 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">REKAPITULASI</span><span class="text-sm">REKAPITULASI IZIN</span></div><i class="fas fa-chart-bar fa-3x text-white/50"></i>
      </a>
      <a href="{{ route('berita.index') }}"
      class="bg-orange-500 text-white p-6 rounded-sm shadow-md flex justify-between items-center hover:bg-orange-600 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">BERITA</span><span class="text-sm">INFORMASI PUBLIK</span></div><i class="fas fa-newspaper fa-3x text-white/50"></i>
      </a>
      <a href="#"
      class="bg-pink-700 text-white p-6 rounded-sm shadow-md flex justify-between items-center hover:bg-pink-800 hover:shadow-lg transition-all duration-300">
      <div><span class="font-bold text-2xl block">SURVEY</span><span class="text-sm">INDEKS KEPUASAN</span></div><span class="font-extrabold text-4xl">98,8</span>
      </a>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
      <a href="{{ route('faq') }}"
      class="bg-white rounded-md shadow-sm px-4 py-8 text-center border border-gray-200 hover:shadow-lg hover:border-indigo-400 transition-all duration-300">
      <i class="fas fa-comments fa-2x text-green-500"></i><span class="mt-2 block font-semibold text-gray-600 text-sm">FAQ</span>
      </a>
      <a href="{{ route('halaman.show', ['slug' => 'janji-layanan']) }}"
      class="bg-white rounded-sm shadow-sm px-4 py-8 text-center border border-gray-200 hover:shadow-lg hover:border-indigo-400 transition-all duration-300">
      <i class="fas fa-handshake fa-2x text-green-500"></i><span class="mt-2 block font-semibold text-gray-600 text-sm">JANJI LAYANAN</span>
      </a>
      <a href="#"
      class="bg-white rounded-sm shadow-sm px-4 py-8 text-center border border-gray-200 hover:shadow-lg hover:border-indigo-400 transition-all duration-300">
      <i class="fas fa-quote-right fa-2x text-green-500"></i><span class="mt-2 block font-semibold text-gray-600 text-sm">VERIFIKASI SK</span>
      </a>
      <a href="{{ route('sdm') }}"
      class="bg-white rounded-sm shadow-sm px-4 py-8 text-center border border-gray-200 hover:shadow-lg hover:border-indigo-400 transition-all duration-300">
      <i class="fas fa-user-tie fa-2x text-green-500"></i><span class="mt-2 block font-semibold text-gray-600 text-sm">SDM</span>
      </a>
      <a href="{{ route('halaman.show', ['slug' => 'alur-perizinan']) }}"
      class="bg-white rounded-sm shadow-sm px-4 py-8 text-center border border-gray-200 hover:shadow-lg hover:border-indigo-400 transition-all duration-300">
      <i class="fas fa-arrows-spin fa-2x text-green-500"></i><span class="mt-2 block font-semibold text-gray-600 text-sm">ALUR PERIZINAN</span>
      </a>
      <a href="#"
      class="bg-white rounded-sm shadow-sm px-4 py-8 text-center border border-gray-200 hover:shadow-lg hover:border-indigo-400 transition-all duration-300">
      <i class="fas fa-cogs fa-2x text-green-500"></i><span class="mt-2 block font-semibold text-gray-600 text-sm">PENGADUAN</span>
      </a>
    </div>
  </section>

  {{-- Konten lainnya sekarang juga berada di dalam container utama --}}
  <section class="grid grid-cols-1 lg:grid-cols-3 gap-12 mb-16 items-start">
    <div class="col-span-2">
      <h2 class="text-2xl font-bold text-gray-800 mb-4">Video Profil</h2>
      <div class="aspect-w-16 aspect-h-9 rounded-sm overflow-hidden shadow-lg">
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
      <a href="{{ route('berita.show', ['slug' => $berita->slug]) }}" class="block bg-white p-4 rounded-lg shadow hover:bg-gray-50 transition">
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

  @if($galleryImages->isNotEmpty())
  <section>
    <div class="text-center mb-10">
      <h2 class="text-3xl font-bold text-gray-800">Galeri Perizinan</h2>
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