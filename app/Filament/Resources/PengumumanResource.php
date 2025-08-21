<?php
namespace App\Filament\Resources;
use App\Filament\Resources\PengumumanResource\Pages;
use App\Models\Pengumuman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PengumumanResource extends Resource {
    protected static ?string $model = Pengumuman::class;
    protected static ?string $modelLabel = 'Pengumuman Berjalan';
    protected static ?string $navigationIcon = 'heroicon-o-speaker-wave';
    // protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\Textarea::make('content')->label('Isi Teks Pengumuman')->required()->columnSpanFull(),
            Forms\Components\TextInput::make('link_url')->label('URL Link (Opsional)')->url(),
            Forms\Components\Toggle::make('is_active')->label('Aktifkan Pengumuman')->default(true)
                ->helperText('Hanya satu pengumuman yang bisa aktif dalam satu waktu.'),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            Tables\Columns\TextColumn::make('content')->label('Isi Teks')->limit(80),
            Tables\Columns\IconColumn::make('is_active')->label('Status')->boolean(),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListPengumuman::route('/'),
            // 'create' => Pages\CreatePengumuman::route('/create'),
            // 'edit' => Pages\EditPengumuman::route('/{record}/edit'),
        ];
    }    
}