<?php

namespace App\Http\View\Composers;

use App\Models\VisitorStat;
use Carbon\Carbon;
use Illuminate\View\View;

class VisitorStatsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // 1. Pengunjung Hari Ini
        $todayVisits = VisitorStat::where('date', today())->first()->visits ?? 0;

        // 2. Pengunjung Minggu Ini
        $thisWeekVisits = VisitorStat::whereBetween('date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->sum('visits');

        // 3. Pengunjung Bulan Ini
        $thisMonthVisits = VisitorStat::whereBetween('date', [
            Carbon::now()->startOfMonth(),
            Carbon::now()->endOfMonth()
        ])->sum('visits');

        // 4. Pengunjung Tahun Ini
        $thisYearVisits = VisitorStat::whereYear('date', Carbon::now()->year)->sum('visits');

        // 5. Total Semua Pengunjung
        $totalVisits = VisitorStat::sum('visits');

        // Kumpulkan semua data dalam satu array
        $stats = [
            'today' => number_format($todayVisits, 0, ',', '.'),
            'this_week' => number_format($thisWeekVisits, 0, ',', '.'),
            'this_month' => number_format($thisMonthVisits, 0, ',', '.'),
            'this_year' => number_format($thisYearVisits, 0, ',', '.'),
            'total' => number_format($totalVisits, 0, ',', '.'),
        ];

        // Kirim array $stats ke view dengan nama variabel 'visitorStats'
        $view->with('visitorStats', $stats);
    }
}