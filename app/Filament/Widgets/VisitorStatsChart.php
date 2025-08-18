<?php

namespace App\Filament\Widgets;

use App\Models\VisitorStat;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;

class VisitorStatsChart extends ChartWidget
{
    protected static ?string $heading = 'Grafik Pengunjung (Bulan Ini)';

    protected static ?int $sort = -3; // Urutan widget, angka kecil akan di atas

    protected function getData(): array
    {
        // Tentukan rentang tanggal: dari awal bulan ini sampai hari ini
        $startDate = Carbon::now()->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        // Ambil data dari database dalam rentang tanggal tersebut
        $stats = VisitorStat::whereBetween('date', [$startDate, $endDate])
                            ->orderBy('date')
                            ->get();

        // Buat array asosiatif untuk pencarian data yang lebih cepat (tanggal => jumlah kunjungan)
        $visitsPerDay = [];
        foreach ($stats as $stat) {
            $visitsPerDay[$stat->date] = $stat->visits;
        }

        // Siapkan array untuk data dan label grafik
        $data = [];
        $labels = [];

        // Buat periode untuk setiap hari dari awal bulan sampai hari ini
        $period = CarbonPeriod::create($startDate, '1 day', Carbon::now());

        foreach ($period as $date) {
            $dateString = $date->toDateString();
            $formattedDate = $date->format('d M'); // Format label (e.g., "18 Agu")

            // Tambahkan label tanggal ke array labels
            $labels[] = $formattedDate;

            // Cek apakah ada data kunjungan pada tanggal ini, jika tidak ada, isi dengan 0
            $data[] = $visitsPerDay[$dateString] ?? 0;
        }

        // Kembalikan data dalam format yang dibutuhkan oleh Chart.js (yang digunakan Filament)
        return [
            'datasets' => [
                [
                    'label' => 'Pengunjung Unik Harian',
                    'data' => $data,
                    'backgroundColor' => 'rgba(59, 130, 246, 0.2)',
                    'borderColor' => 'rgba(59, 130, 246, 1)',
                    'tension' => 0.3,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'line'; // Tipe grafik: line, bar, pie, etc.
    }
}