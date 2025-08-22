<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;

class DokumenPublikController extends Controller
{
    /**
     * Menampilkan tabel dokumen kategori Regulasi.
     */
    public function regulasi()
    {
        $dokumens = Dokumen::where('is_published', true)
                           ->where('category', 'Regulasi')
                           ->latest('created_at')
                           ->paginate(15); // 15 dokumen per halaman

        return view('pages.dokumen.regulasi', ['dokumens' => $dokumens]);
    }

    /**
     * Menampilkan tabel dokumen kategori Perencanaan.
     */
    public function perencanaan()
    {
        $dokumens = Dokumen::where('is_published', true)
                           ->where('category', 'Perencanaan')
                           ->latest('created_at')
                           ->paginate(15); // 15 dokumen per halaman

        return view('pages.dokumen.perencanaan', ['dokumens' => $dokumens]);
    }
}