<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->text('question'); // Menggunakan tipe 'text' untuk pertanyaan yang mungkin panjang
            $table->longText('answer'); // Menggunakan 'longText' untuk jawaban yang bisa sangat panjang dan berformat
            $table->integer('sequence')->default(0); // Untuk pengurutan
            $table->boolean('is_published')->default(false); // Untuk status publikasi
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};