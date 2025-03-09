<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fest', function (Blueprint $table) {
            $table->id();
            $table->string('nama_fest');
            $table->string('deskripsi_fest');
            $table->string('jadwal_fest');
            $table->string('lokasi');
            $table->text('rangkaian_acara');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fest');
    }
};
