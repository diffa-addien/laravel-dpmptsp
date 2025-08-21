<?php
// File: app/Filament/Resources/ProfilDinasResource.php

namespace App\Filament\Resources;

use App\Filament\Resources\ProfilDinasResource\Pages;
use App\Models\ProfilDinas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;

class ProfilDinasResource extends Resource
{
    protected static ?string $model = ProfilDinas::class;
    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';
    protected static ?string $navigationGroup = 'Pengaturan';
    protected static ?string $navigationLabel = 'Profil Dinas';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Informasi Kontak Utama')
                ->description('Informasi ini akan ditampilkan di bagian footer dan halaman kontak.')
                ->schema([
                    Forms\Components\TextInput::make('address')->label('Alamat Kantor')->required(),
                    Forms\Components\TextInput::make('phone')->label('Nomor Telepon')->required(),
                    Forms\Components\TextInput::make('email')->label('Alamat Email')->email()->required(),
                ]),
            Forms\Components\Section::make('Media Sosial (Opsional)')
                ->description('Masukkan URL lengkap akun media sosial Anda.')
                ->schema([
                    Forms\Components\TextInput::make('facebook_url')->label('URL Facebook')->url(),
                    Forms\Components\TextInput::make('instagram_url')->label('URL Instagram')->url(),
                    Forms\Components\TextInput::make('twitter_url')->label('URL Twitter/X')->url(),
                    Forms\Components\TextInput::make('youtube_url')->label('URL Youtube')->url(),
                ]),
        ]);
    }

    /**
     * Daftarkan halaman yang dibutuhkan.
     * Kita TIDAK mendaftarkan halaman 'index'.
     */
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProfilDinas::route('/'),
            'create' => Pages\CreateProfilDinas::route('/create'),
            'edit' => Pages\EditProfilDinas::route('/{record}/edit'),
        ];
    }

    /**
     * INI ADALAH KUNCI SOLUSINYA.
     * Method ini secara paksa mengubah link navigasi di sidebar.
     * Ia tidak akan lagi mencari rute 'index' yang tidak ada.
     */
    public static function getNavigationUrl(): string
    {
        // Cek apakah data profil sudah ada di database.
        $profil = ProfilDinas::first();

        // Jika SUDAH ADA, arahkan link navigasi ke halaman EDIT data tersebut.
        if ($profil) {
            return static::getUrl('edit', ['record' => $profil]);
        }
        
        // Jika BELUM ADA, arahkan link navigasi ke halaman CREATE.
        return static::getUrl('create');
    }
}