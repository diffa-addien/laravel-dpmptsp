<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // File: database/migrations/xxxx_xx_xx_xxxxxx_create_sdms_table.php

    public function up(): void
    {
        Schema::create('sdms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position_name'); // Nama Jabatan, e.g., "Kepala Dinas"
            $table->string('position_type'); // Jenis Jabatan (kepala, sekretariat, lainnya)
            $table->integer('sequence')->default(0); // Untuk pengurutan
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sdms');
    }
};
