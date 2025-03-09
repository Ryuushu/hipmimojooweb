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
        Schema::create('proker', function (Blueprint $table) {
            $table->id();
            $table->foreignId('devisi_id')->constrained('divisi')->restrictOnDelete();
            $table->string('ajuan_proker');
            $table->string('rencana_pelaksanaan')->nullable();
            $table->text('progress')->nullable();
            $table->text('monitoring_evaluasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proker');
    }
};
