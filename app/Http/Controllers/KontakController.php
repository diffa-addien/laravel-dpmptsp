<?php

namespace App\Http\Controllers;

use App\Models\ProfilDinas; // <-- PENTING: Tambahkan 'use' statement ini
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Menampilkan halaman kontak.
     */
    public function index()
    {
        // 1. Ambil data profil dinas dari database.
        // `firstOrNew([])` memastikan kita selalu mendapatkan objek, bahkan jika tabel kosong.
        $profilDinas = ProfilDinas::firstOrNew([]);

        // 2. Kirim data tersebut ke view dengan nama variabel 'profilDinas'
        return view('pages.kontak', [
            'profilDinas' => $profilDinas
        ]);
    }
}