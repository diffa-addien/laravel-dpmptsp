<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;

class HalamanController extends Controller
{
    /**
     * Menampilkan satu halaman dinamis berdasarkan slug-nya.
     *
     * @param string $slug
     * @return \Illuminate\View\View
     */
    public function show($slug)
    {
        // Cari halaman di database berdasarkan slug yang diberikan dari URL
        // Pastikan juga halaman tersebut sudah berstatus "published"
        // Jika tidak ditemukan, Laravel akan otomatis menampilkan halaman 404 Not Found
        $halaman = Halaman::where('slug', $slug)
                          ->where('is_published', true)
                          ->firstOrFail();

        // Kirim data halaman yang ditemukan ke file view
        return view('pages.halaman.show', [
            'halaman' => $halaman
        ]);
    }
}