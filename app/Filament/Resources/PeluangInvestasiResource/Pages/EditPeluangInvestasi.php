<?php

namespace App\Filament\Resources\PeluangInvestasiResource\Pages;

use App\Filament\Resources\PeluangInvestasiResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPeluangInvestasi extends EditRecord
{
    protected static string $resource = PeluangInvestasiResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
