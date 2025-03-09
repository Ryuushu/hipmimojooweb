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
            $table->string('stat1')->nullable();
            $table->string('stat2')->nullable();
            $table->string('stat3')->nullable();
            $table->string('stat4')->nullable();
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
