<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    protected static ?string $navigationGroup = 'Manajemen Konten';
    protected static ?string $navigationLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';
    protected static ?string $modelLabel = 'Data';
    // protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Konten Berita')->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(Berita::class, 'slug', ignoreRecord: true),

                        Forms\Components\RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            ->columnSpanFull()
                            ->disableToolbarButtons([
                                'attachFiles', // Ini untuk mematikan tombol upload file/media di dalam editor
                            ]),
                    ])->columns(2),

                    Forms\Components\Section::make('Gambar')->schema([
                        Forms\Components\SpatieMediaLibraryFileUpload::make('media')
                            ->label('Multi Gambar')
                            ->collection('berita_images') // Nama koleksi media
                            ->disk('uploads')
                            ->multiple()
                            ->reorderable()
                            ->image()
                            ->maxFiles(5)
                            ->imageEditor(),
                    ]),
                ])->columnSpan(2),

                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Status')->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(false),

                        Forms\Components\DatePicker::make('published_at')
                            ->label('Tanggal Publikasi')
                            ->default(now()),
                    ]),

                    Forms\Components\Section::make('Kategori')->schema([
                        Forms\Components\Select::make('category')
                            ->label('Kategori Berita')
                            ->required()
                            ->options([
                                'Berita Terkini' => 'Berita Terkini',
                                'Pengumuman' => 'Pengumuman',
                                'Kegiatan Dinas' => 'Kegiatan Dinas',
                                'Artikel' => 'Artikel',
                            ])
                            ->native(false),
                    ]),
                ])->columnSpan(1),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\SpatieMediaLibraryImageColumn::make('thumbnail')
                    ->label('Gambar')
                    ->collection('berita_images'), // Harus sama dengan di form

                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),

                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tgl Publikasi')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}