<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    /**
     * Menampilkan halaman daftar semua berita dengan pagination.
     */
    public function index()
    {
        $beritas = Berita::where('is_published', true)
                        ->latest('published_at')
                        ->paginate(9); // Menampilkan 9 berita per halaman

        return view('pages.berita.index', [
            'beritas' => $beritas
        ]);
    }

    /**
     * Menampilkan halaman detail satu berita berdasarkan slug.
     */
    public function show($slug)
    {
        $berita = Berita::where('slug', $slug)
                       ->where('is_published', true)
                       ->firstOrFail(); // Otomatis 404 jika tidak ditemukan/tidak publish

        // Ambil 5 berita terbaru lainnya, kecuali yang sedang dibuka
        $recentBerita = Berita::where('is_published', true)
                            ->where('id', '!=', $berita->id)
                            ->latest('published_at')
                            ->take(5)
                            ->get();

        return view('pages.berita.show', [
            'berita' => $berita,
            'recentBerita' => $recentBerita
        ]);
    }
}