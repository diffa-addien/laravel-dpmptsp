<?php

namespace App\Livewire;

use App\Models\KategoriPerizinan;
use App\Models\Perizinan;
use Livewire\Component;

class SyaratPerizinan extends Component
{
    // Properti untuk menyimpan daftar dan nilai terpilih
    public $kategoriList;
    public $perizinanList = [];
    public $selectedKategori = null;
    public $selectedPerizinan = null;

    // Properti untuk modal/popup
    public $detailPerizinan = null;
    public $showModal = false;

    // PROPERTI BARU UNTUK MENGONTROL MODE TAMPILAN
    public $mode = 'syarat'; // Nilai default adalah 'syarat'

    // Method yang berjalan saat komponen pertama kali dimuat
    public function mount($mode = 'syarat') // Terima parameter mode
    {
        $this->mode = $mode; // Set mode berdasarkan parameter
        $this->kategoriList = KategoriPerizinan::orderBy('name')->get();
    }

    // Method yang berjalan setiap kali $selectedKategori berubah
    public function updatedSelectedKategori($kategoriId)
    {
        if (!is_null($kategoriId) && $kategoriId !== '') {
            $this->perizinanList = Perizinan::where('kategori_perizinan_id', $kategoriId)->orderBy('name')->get();
        } else {
            $this->perizinanList = [];
        }
        $this->reset(['selectedPerizinan', 'detailPerizinan']);
    }

    // Method yang dipanggil saat tombol diklik
    public function tampilkanPersyaratan()
    {
        if (!is_null($this->selectedPerizinan) && $this->selectedPerizinan !== '') {
            $this->detailPerizinan = Perizinan::find($this->selectedPerizinan);
            $this->showModal = true;
        }
    }

    // Method untuk menutup modal
    public function closeModal()
    {
        $this->showModal = false;
        $this->detailPerizinan = null;
    }

    public function render()
    {
        return view('livewire.syarat-perizinan');
    }
}