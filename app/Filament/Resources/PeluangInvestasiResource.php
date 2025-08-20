<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PeluangInvestasiResource\Pages;
use App\Models\PeluangInvestasi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class PeluangInvestasiResource extends Resource
{
    protected static ?string $model = PeluangInvestasi::class;
    protected static ?string $modelLabel = 'Peluang Investasi';
    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';
    protected static ?string $navigationGroup = 'Manajemen Utama';

    protected static ?string $pluralModelLabel = 'Peluang Investasi';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Peluang Investasi')
                        ->required()
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')->required()->unique(ignoreRecord: true),

                    Forms\Components\SpatieMediaLibraryFileUpload::make('investment_image')
                        ->label('Gambar Utama')
                        ->collection('investment_image')
                        ->disk('uploads')
                        ->image()->imageEditor()->required(),

                    Forms\Components\RichEditor::make('description')
                        ->label('Deskripsi Lengkap')
                        ->required()
                        ->columnSpanFull(),
                ])->columnSpan(2),

                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Status')->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('investment_image')->collection('investment_image')->disk('uploads')->label('Gambar'),
                Tables\Columns\TextColumn::make('title')->label('Judul')->searchable(),
                Tables\Columns\IconColumn::make('is_published')->label('Status')->boolean(),
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
            'index' => Pages\ListPeluangInvestasis::route('/'),
            // 'create' => Pages\CreatePeluangInvestasi::route('/create'),
            // 'edit' => Pages\EditPeluangInvestasi::route('/{record}/edit'),
        ];
    }    
}