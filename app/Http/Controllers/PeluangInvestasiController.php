<?php

namespace App\Http\Controllers;

use App\Models\PeluangInvestasi;
use Illuminate\Http\Request;

class PeluangInvestasiController extends Controller
{
    // Menampilkan halaman daftar semua peluang investasi
    public function index()
    {
        $investments = PeluangInvestasi::where('is_published', true)
                                      ->latest()
                                      ->paginate(9);

        return view('pages.investasi.index', ['investments' => $investments]);
    }

    // Menampilkan halaman detail satu peluang investasi
    public function show($slug)
    {
        $investment = PeluangInvestasi::where('slug', $slug)
                                      ->where('is_published', true)
                                      ->firstOrFail();

        return view('pages.investasi.show', ['investment' => $investment]);
    }
}