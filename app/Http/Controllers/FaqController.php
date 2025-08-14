<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        // Ambil semua FAQ yang is_published = true, urutkan berdasarkan sequence
        $faqs = Faq::where('is_published', true)
                   ->orderBy('sequence', 'asc')
                   ->get();

        // Kirim data ke view
        return view('pages.faq', [
            'faqs' => $faqs
        ]);
    }
}