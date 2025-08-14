<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PerizinanResource\Pages;
use App\Models\Perizinan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class PerizinanResource extends Resource
{
    protected static ?string $model = Perizinan::class;

    protected static ?string $modelLabel = 'Perizinan';

    protected static ?string $pluralModelLabel = 'Perizinan';

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Manajemen Perizinan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\Select::make('kategori_perizinan_id')
                        ->label('Kategori Perizinan')
                        ->relationship('kategoriPerizinan', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('name')
                        ->label('Nama Jenis Izin')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(ignoreRecord: true),

                    Forms\Components\TextInput::make('processing_time')
                        ->label('Lama Proses'),

                    Forms\Components\TextInput::make('fee')
                        ->label('Biaya')
                        ->prefix('Rp'),

                    Forms\Components\RichEditor::make('requirements')
                        ->label('Persyaratan')
                        ->columnSpanFull(),

                    Forms\Components\RichEditor::make('how_to_register')
                        ->label('Cara Mendaftar')
                        ->columnSpanFull(),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Izin')
                    ->searchable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('kategoriPerizinan.name') // Menampilkan nama dari relasi
                    ->label('Kategori')
                    ->badge()
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('processing_time')
                    ->label('Lama Proses'),

                Tables\Columns\TextColumn::make('fee')
                    ->label('Biaya')
                    ->money('IDR'), // Format sebagai mata uang Rupiah
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
            'index' => Pages\ListPerizinans::route('/'),
            // 'create' => Pages\CreatePerizinan::route('/create'),
            // 'edit' => Pages\EditPerizinan::route('/{record}/edit'),
        ];
    }
}