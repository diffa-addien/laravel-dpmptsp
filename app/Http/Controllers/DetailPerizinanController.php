<?php

namespace App\Http\Controllers;

use App\Models\Perizinan;
use Illuminate\Http\Request;

class DetailPerizinanController extends Controller
{
    public function show($slug)
    {
        // Cari data perizinan berdasarkan slug
        // Jika tidak ditemukan, otomatis akan menampilkan halaman 404 Not Found
        $perizinan = Perizinan::where('slug', $slug)->firstOrFail();

        // Kirim data ke view
        return view('pages.cara-mendaftar', [
            'perizinan' => $perizinan,
        ]);
    }
}