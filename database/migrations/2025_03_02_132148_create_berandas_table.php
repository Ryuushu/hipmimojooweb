<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up() {
        Schema::create('berandas', function (Blueprint $table) {
            $table->id();
            $table->string('title_web');
            $table->string('slogan');
            $table->string('stat1');
            $table->string('stat2');
            $table->string('stat3');
            $table->string('stat4');
            $table->text('deskripsi_hipmi');
            $table->text('visi');
            $table->text('misi');
            $table->text('deskripsi_keanggotaan');
            $table->text('deskripsi_sejarah');
            $table->text('deskripsi_kepengurusan');
            $table->text('deskripsi_tentang');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('berandas');
    }
};
