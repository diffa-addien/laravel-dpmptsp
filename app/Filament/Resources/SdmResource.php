<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SdmResource\Pages;
use App\Models\Sdm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SdmResource extends Resource
{
    protected static ?string $model = Sdm::class;

    protected static ?string $modelLabel = 'SDM';

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Manajemen Utama';

    protected static ?string $navigationLabel = 'SDM';
    protected static ?string $pluralModelLabel = 'SDM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\SpatieMediaLibraryFileUpload::make('sdm_photo')
                        ->label('Foto')
                        ->collection('sdm_photo') // Nama koleksi harus sama dengan di Model
                        ->disk('uploads') // Menggunakan disk manual
                        ->image()
                        ->imageEditor()
                        ->required()
                        ->columnSpanFull(),

                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('position_name')
                        ->label('Nama Jabatan')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\Select::make('position_type')
                        ->label('Jenis Jabatan')
                        ->options([
                            'kepala' => 'Kepala',
                            'sekretariat' => 'Sekretariat',
                            'lainnya' => 'Lainnya',
                        ])
                        ->required()
                        ->native(false),

                    Forms\Components\TextInput::make('sequence')
                        ->label('Urutan Tampil')
                        ->numeric()
                        ->default(0)
                        ->required(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom 'sequence' telah dihapus dari sini

                Tables\Columns\SpatieMediaLibraryImageColumn::make('sdm_photo')
                    ->label('Foto')
                    ->collection('sdm_photo')
                    ->disk('uploads')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable(),

                Tables\Columns\TextColumn::make('position_name')
                    ->label('Jabatan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('position_type')
                    ->label('Jenis')
                    ->badge()
                    ->formatStateUsing(fn(string $state): string => ucfirst($state)),
            ])
            // Fitur reorderable juga telah dihapus dari sini
            ->defaultSort('name', 'asc') // Mengubah default sort ke 'nama'
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSdms::route('/'),
            // 'create' => Pages\CreateSdm::route('/create'),
            // 'edit' => Pages\EditSdm::route('/{record}/edit'),
        ];
    }
}