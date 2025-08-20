<?php

namespace App\Livewire;

use App\Models\KategoriPerizinan;
use Livewire\Component;

class DaftarPerizinan extends Component
{
    public $kategoriList;
    public $selectedKategori = null;
    public $showModal = false;

    // Method yang berjalan saat komponen pertama kali dimuat
    public function mount()
    {
        // Ambil semua kategori beserta jumlah perizinan di dalamnya
        // Filter ->where('is_published', true) telah dihapus
        $this->kategoriList = KategoriPerizinan::withCount('perizinans')->orderBy('name')->get();
    }

    public function showListPerizinan($kategoriId)
    {
        // Ambil data kategori yang dipilih beserta relasi perizinan-nya
        // Filter ->where('is_published', true) telah dihapus
        $this->selectedKategori = KategoriPerizinan::with([
            'perizinans' => function ($query) {
                $query->orderBy('name');
            }
        ])->find($kategoriId);

        $this->showModal = true;
    }

    // Method untuk menutup modal/popup
    public function closeModal()
    {
        $this->showModal = false;
        $this->selectedKategori = null;
    }

    public function render()
    {
        return view('livewire.daftar-perizinan');
    }
}