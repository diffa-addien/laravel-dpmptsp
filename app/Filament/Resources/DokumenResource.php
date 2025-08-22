<?php
namespace App\Filament\Resources;
use App\Filament\Resources\DokumenResource\Pages;
use App\Models\Dokumen;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DokumenResource extends Resource {
    protected static ?string $model = Dokumen::class;
    protected static ?string $modelLabel = 'Dokumen Publik';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form {
        return $form->schema([
            Forms\Components\TextInput::make('title')->label('Judul Dokumen')->required()->columnSpanFull(),
            Forms\Components\Select::make('category')->label('Kategori')
                ->options([
                    'Perencanaan' => 'Perencanaan',
                    'Regulasi' => 'Regulasi',
                ])
                ->required()
                ->native(false),
            Forms\Components\Toggle::make('is_published')->label('Publikasikan')->default(true),
            Forms\Components\SpatieMediaLibraryFileUpload::make('document_file')
                ->collection('dokumen')
                ->disk('uploads')
                ->label('File Dokumen (PDF, Word, Excel, dll)')
                ->required()
                ->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table {
        return $table->columns([
            Tables\Columns\TextColumn::make('title')->label('Judul Dokumen')->searchable(),
            Tables\Columns\TextColumn::make('category')->label('Kategori')->badge(),
            Tables\Columns\IconColumn::make('is_published')->label('Status')->boolean(),
        ])->actions([Tables\Actions\EditAction::make(), Tables\Actions\DeleteAction::make()]);
    }

    public static function getPages(): array {
        return [
            'index' => Pages\ListDokumens::route('/'),
            // 'create' => Pages\CreateDokumen::route('/create'),
            // 'edit' => Pages\EditDokumen::route('/{record}/edit'),
        ];
    }
}