<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HalamanResource\Pages;
use App\Models\Halaman;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\HtmlString;

class HalamanResource extends Resource
{
    protected static ?string $model = Halaman::class;

    protected static ?string $modelLabel = 'Halaman';

    protected static ?string $pluralModelLabel = 'Halaman';

    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';

    protected static ?string $navigationGroup = 'Manajemen Konten';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // =======================================================
                // PANEL INFORMASI LINK DITAMBAHKAN DI SINI
                // =======================================================
                Forms\Components\Section::make('Halaman Publik')
                    ->description('Panel ini berisi informasi mengenai bagaimana halaman ini akan diakses oleh pengunjung.')
                    ->collapsible() // Membuat section ini bisa dilipat
                    ->schema([
                        Forms\Components\Placeholder::make('link_halaman')
                            ->label('URL Halaman')
                            ->content(function (Forms\Get $get, ?Halaman $record): HtmlString {
                                // Jika slug kosong (saat membuat halaman baru), tampilkan pesan
                                $slug = $get('slug');
                                if (empty($slug)) {
                                    return new HtmlString('<em>URL akan otomatis dibuat setelah Anda mengisi Judul.</em>');
                                }

                                // Buat URL lengkap berdasarkan slug
                                $url = route('halaman.show', ['slug' => $slug]);

                                // Jika halaman sudah ada dan sudah dipublikasikan, buat link yang bisa diklik
                                if ($record && $record->is_published) {
                                    return new HtmlString(
                                        "<a href='{$url}' target='_blank' class='text-blue-600 hover:underline flex items-center'>
                                            <span>{$url}</span>
                                            <i class='fas fa-external-link-alt ml-2 text-xs'></i>
                                        </a>"
                                    );
                                }

                                // Jika halaman belum disimpan atau belum publish, tampilkan sebagai teks biasa
                                return new HtmlString(
                                    "<span class='text-gray-500'>{$url}</span>
                                     <em class='block text-xs text-gray-400 mt-1'>Link akan aktif setelah halaman disimpan dan dipublikasikan.</em>"
                                );
                            }),
                    ]),

                // Skema form lainnya tetap sama
                Forms\Components\Group::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Judul Halaman')
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur: true)
                        ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state))),

                    Forms\Components\TextInput::make('slug')
                        ->required()
                        ->maxLength(255)
                        ->unique(Halaman::class, 'slug', ignoreRecord: true),

                    Forms\Components\RichEditor::make('content')
                        ->label('Isi Halaman')
                        ->required()
                        ->columnSpanFull()
                        ->disableToolbarButtons(['attachFiles']),
                ])->columnSpan(2),

                Forms\Components\Group::make()->schema([
                    Forms\Components\Section::make('Status')->schema([
                        Forms\Components\Toggle::make('is_published')
                            ->label('Publikasikan')
                            ->default(true),
                    ]),
                ])->columnSpan(1),
            ])
            ->columns(3);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),

                Tables\Columns\TextColumn::make('slug'),

                Tables\Columns\IconColumn::make('is_published')
                    ->label('Status')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make('Lihat')
                    ->label('Lihat')
                    ->url(fn(Halaman $record): string => route('halaman.show', ['slug' => $record->slug]))
                    ->icon('heroicon-o-arrow-top-right-on-square')
                    ->openUrlInNewTab(),
                Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->modalHeading('Peringatan Hapus Halaman')
                    ->modalDescription(new HtmlString('Apakah Anda yakin ingin menghapus halaman ini? <br><br><strong>Tindakan ini akan membuat halaman terkait di sisi publik tidak bisa diakses dan menyebabkan error 404 Not Found.</strong>'))
                    ->modalSubmitActionLabel('Ya, Hapus Sekarang'),
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
            'index' => Pages\ListHalamans::route('/'),
            // 'create' => Pages\CreateHalaman::route('/create'),
            // 'edit' => Pages\EditHalaman::route('/{record}/edit'),
        ];
    }
}