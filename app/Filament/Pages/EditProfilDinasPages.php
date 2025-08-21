<?php

namespace App\Filament\Resources\ProfilDinasResource\Pages;

use App\Filament\Resources\ProfilDinasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilDinasPages extends EditRecord
{
    protected static string $resource = ProfilDinasResource::class;

    // Menghilangkan tombol "Delete", "View", dll.
    protected function getHeaderActions(): array
    {
        return [];
    }

    // Mengarahkan pengguna kembali ke halaman edit setelah menyimpan
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
    
    // Mengubah judul halaman saat mode "Create"
    public function getTitle(): string
    {
        // Jika record (data) belum ada, berarti ini mode "Create"
        if (!$this->getRecord()) {
            return 'Buat Profil Dinas';
        }

        // Jika sudah ada, ini mode "Edit"
        return parent::getTitle();
    }
}