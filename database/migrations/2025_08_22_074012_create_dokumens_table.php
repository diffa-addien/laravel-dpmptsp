<?php
// File: database/migrations/xxxx_xx_xx_xxxxxx_create_dokumens_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dokumens', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category'); // Kolom untuk kategori statis
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('dokumens');
    }
};