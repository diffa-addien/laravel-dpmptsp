<?php
// File: app/Filament/Resources/ProfilDinasResource/Pages/EditProfilDinas.php

namespace App\Filament\Resources\ProfilDinasResource\Pages;

use App\Filament\Resources\ProfilDinasResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProfilDinas extends EditRecord
{
    protected static string $resource = ProfilDinasResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }

    // Mengubah judul agar lebih sesuai
    public function getTitle(): string
    {
        return 'Edit Profil Dinas';
    }
}