<?php

namespace App\Http\Controllers;

use App\Models\VisitorStat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // <-- PENTING: Tambahkan ini

class VisitorController extends Controller
{
    public function ping()
    {
        // Cari baris untuk tanggal hari ini, atau buat baru jika tidak ada.
        // Kemudian, langsung tambahkan (increment) kolom 'visits' sebanyak 1.
        // Ini adalah operasi atomik di database, sangat aman dan efisien.
        VisitorStat::updateOrCreate(
            ['date' => now()->toDateString()],
            ['visits' => DB::raw('visits + 1')]
        );

        return response()->json(['status' => 'ok']);
    }
}