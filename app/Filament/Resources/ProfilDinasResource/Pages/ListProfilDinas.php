<?php
// File: app/Filament/Resources/ProfilDinasResource/Pages/ListProfilDinas.php

namespace App\Filament\Resources\ProfilDinasResource\Pages;

use App\Filament\Resources\ProfilDinasResource;
use App\Models\ProfilDinas;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Http\RedirectResponse;

class ListProfilDinas extends ListRecords
{
    protected static string $resource = ProfilDinasResource::class;

    /**
     * Method ini berjalan sebelum halaman dirender.
     * Di sinilah kita menempatkan logika redirect.
     */
    public function mount(): void
    {
        parent::mount();

        $profil = ProfilDinas::first();

        if ($profil) {
            // Jika data sudah ada, redirect ke halaman edit
            redirect()->to($this->getResource()::getUrl('edit', ['record' => $profil]));
        } else {
            // Jika data belum ada, redirect ke halaman create
            redirect()->to($this->getResource()::getUrl('create'));
        }
    }

    // Kita kosongkan header actions agar tombol "New" tidak muncul di sini
    protected function getHeaderActions(): array
    {
        return [];
    }
}