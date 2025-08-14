<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();

            // Kolom untuk relasi ke tabel kategori_perizinans
            $table->foreignId('kategori_perizinan_id')
                  ->constrained('kategori_perizinans') // merujuk ke tabel 'kategori_perizinans'
                  ->cascadeOnDelete(); // Jika kategori dihapus, perizinan terkait juga terhapus

            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('requirements')->nullable(); // Untuk persyaratan (bisa banyak teks)
            $table->string('processing_time')->nullable(); // e.g., "7 Hari Kerja"
            $table->string('fee')->nullable(); // e.g., "Gratis" atau "Rp 100.000"

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perizinans');
    }
};