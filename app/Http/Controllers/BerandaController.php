<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Slider;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('is_published', true)
            ->orderBy('sequence', 'asc')
            ->take(3)
            ->get();

        // Mengambil 4 berita terbaru yang sudah dipublikasikan
        $latestBerita = Berita::where('is_published', true)
            ->latest('published_at')
            ->take(4)
            ->get();

        // Mengambil 1 berita utama untuk ditampilkan fotonya di galeri (untuk sementara)
        $galleryBerita = Berita::where('is_published', true)
            ->latest()
            ->first();

        $galleryImages = $galleryBerita
            ? $galleryBerita->getMedia('berita_images')
            : collect();

        // Kirim semua data ke view 'pages.beranda'
        return view('pages.beranda', [
            'sliders' => $sliders,
            'latestBerita' => $latestBerita,
            'galleryImages' => $galleryImages,
        ]);
    }
}