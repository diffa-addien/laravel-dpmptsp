<?php

namespace App\Http\View\Composers;

use App\Models\Pengumuman;
use Illuminate\View\View;

class AnnouncementComposer
{
    /**
     * Method ini akan berjalan setiap kali layout utama dimuat.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // Cari satu pengumuman yang statusnya 'is_active' = true
        $activeAnnouncement = Pengumuman::where('is_active', true)->first();

        // Kirim data yang ditemukan ke view dengan nama variabel 'activeAnnouncement'
        $view->with('activeAnnouncement', $activeAnnouncement);
    }
}