<?php

namespace App\Filament\Resources\KategoriPerizinanResource\Pages;

use App\Filament\Resources\KategoriPerizinanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditKategoriPerizinan extends EditRecord
{
    protected static string $resource = KategoriPerizinanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
