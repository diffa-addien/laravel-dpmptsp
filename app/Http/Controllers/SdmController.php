<?php

namespace App\Http\Controllers;

use App\Models\Sdm;
use Illuminate\Http\Request;

class SdmController extends Controller
{
    public function index()
    {
        // Ambil semua data SDM, urutkan berdasarkan 'sequence' yang sudah kita buat
        $allSdm = Sdm::orderBy('sequence', 'asc')->get();

        // Kelompokkan data berdasarkan 'position_type'
        $groupedSdm = $allSdm->groupBy('position_type');

        // Definisikan urutan grup yang diinginkan
        $order = ['kepala', 'sekretariat', 'lainnya'];
        $sdmByGroup = [];

        // Susun ulang grup sesuai urutan yang kita definisikan
        foreach ($order as $key) {
            if (isset($groupedSdm[$key])) {
                $sdmByGroup[$key] = $groupedSdm[$key];
            }
        }

        // Kirim data yang sudah dikelompokkan dan diurutkan ke view
        return view('pages.struktur-organisasi', [
            'sdmByGroup' => $sdmByGroup
        ]);
    }
}