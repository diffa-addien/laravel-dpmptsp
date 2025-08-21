<?php
namespace App\Http\View\Composers;
use App\Models\ProfilDinas;
use Illuminate\View\View;

class ProfilDinasComposer {
    public function compose(View $view) {
        // Ambil baris pertama (satu-satunya) dari data profil dinas
        // `firstOrNew` memastikan kita selalu mendapat objek, bahkan jika tabel kosong
        $profilDinas = ProfilDinas::firstOrNew([]);
        $view->with('profilDinas', $profilDinas);
    }
}