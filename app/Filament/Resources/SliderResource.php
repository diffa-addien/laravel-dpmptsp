<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;
    protected static ?string $modelLabel = 'Slider Beranda';
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    // protected static ?string $navigationGroup = 'Manajemen Konten';

    protected static ?string $navigationLabel = 'Slider';
    protected static ?string $pluralModelLabel = 'Slider';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make()->schema([
                    Forms\Components\SpatieMediaLibraryFileUpload::make('slider_image')
                        ->label('Gambar Slider')
                        ->collection('slider_image')
                        ->disk('uploads')
                        ->required()
                        ->image()
                        ->imageEditor()
                        ->hint('Wajib diisi')
                        ->helperText('Rekomendasi resolusi: 1920x1080px'),

                    Forms\Components\TextInput::make('title')
                        ->label('Judul Utama')
                        ->hint('wajib diisi')
                        ->required(),

                    Forms\Components\TextInput::make('subtitle')
                        ->label('Sub Judul'),

                    Forms\Components\TextInput::make('link_text')
                        ->label('Teks Tombol (Contoh: Selengkapnya)'),

                    Forms\Components\TextInput::make('link_url')
                        ->label('URL Link Tombol'),

                    Forms\Components\Toggle::make('is_published')
                        ->label('Publikasikan')
                        ->default(true),

                    Forms\Components\TextInput::make('sequence')
                        ->label('Urutan')
                        ->numeric()
                        ->default(0),
                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('slider_image')
                    ->label('Gambar')
                    ->collection('slider_image')
                    ->disk('uploads'),

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),
            ])
            ->reorderable('sequence')
            ->defaultSort('sequence', 'asc')
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
            'index' => Pages\ListSliders::route('/'),
            // 'create' => Pages\CreateSlider::route('/create'),
            // 'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }    
}