<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\VisitorStatsComposer; // <-- TAMBAHKAN INI
use App\Http\View\Composers\AnnouncementComposer;
use App\Http\View\Composers\ProfilDinasComposer; // <-- TAMBAHKAN INI
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        View::composer('layouts.front', VisitorStatsComposer::class);
        View::composer('layouts.front', AnnouncementComposer::class); // <-- TAMBAHKAN INI
        View::composer('layouts.front', ProfilDinasComposer::class); // <-- TAMBAHKAN INI
    }
}
