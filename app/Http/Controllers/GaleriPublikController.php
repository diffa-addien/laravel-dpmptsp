<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class GaleriPublikController extends Controller
{
    public function index()
    {
        // Ambil semua berita yang:
        // 1. Sudah berstatus 'is_published' = true
        // 2. Memiliki media/gambar yang terhubung (->has('media'))
        // 3. Diurutkan dari yang terbaru
        // 4. Dibagi per halaman (paginate)
        $beritasWithMedia = Berita::where('is_published', true)
                                  ->has('media') // Hanya ambil berita yang punya gambar
                                  ->latest('published_at')
                                  ->paginate(12); // Menampilkan berita dari 12 album/kegiatan per halaman

        return view('pages.galeri-publik', [
            'beritasWithMedia' => $beritasWithMedia
        ]);
    }
}