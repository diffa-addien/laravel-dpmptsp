<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_stats', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique(); // Setiap tanggal hanya akan ada satu baris
            $table->unsignedBigInteger('visits')->default(0); // Jumlah kunjungan hari itu
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_stats');
    }
};