<?php
// File: app/Filament/Resources/ProfilDinasResource/Pages/CreateProfilDina.php

namespace App\Filament\Resources\ProfilDinasResource\Pages;

use App\Filament\Resources\ProfilDinasResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProfilDina extends CreateRecord
{
    protected static string $resource = ProfilDinasResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('edit', ['record' => $this->getRecord()]);
    }
}