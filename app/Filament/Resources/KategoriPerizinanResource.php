<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KategoriPerizinanResource\Pages;
use App\Models\KategoriPerizinan; // <-- Menggunakan Model yang benar
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class KategoriPerizinanResource extends Resource // <-- Nama class sudah benar
{
    protected static ?string $model = KategoriPerizinan::class; // <-- Referensi model sudah benar

    protected static ?string $modelLabel = 'Kategori Perizinan';

    protected static ?string $pluralModelLabel = 'Kategori Perizinan';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationGroup = 'Manajemen Perizinan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nama Kategori')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                    ->unique(ignoreRecord: true),

                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),

                Forms\Components\Textarea::make('description')
                    ->label('Deskripsi Singkat')
                    ->rows(3)
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('description')
                    ->label('Deskripsi')
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->description),
            ])
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
            'index' => Pages\ListKategoriPerizinans::route('/'), // <-- Disesuaikan oleh Filament
            // 'create' => Pages\CreateKategoriPerizinan::route('/create'), // <-- Disesuaikan oleh Filament
            // 'edit' => Pages\EditKategoriPerizinan::route('/{record}/edit'), // <-- Disesuaikan oleh Filament
        ];
    }    
}