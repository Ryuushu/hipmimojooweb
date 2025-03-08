<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('kegiatan_selesais', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('title');
            $table->text('deskripsi');
            $table->text('url')->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('kegiatan_selesais');
    }
};
