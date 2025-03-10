<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beranda extends Model {
    use HasFactory;
    protected $table = 'berandas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title_web', 'slogan', 'stat1', 'stat2', 'stat3', 'stat4',
        'deskripsi_hipmi', 'visi', 'misi', 'deskripsi_keanggotaan',
        'deskripsi_sejarah', 'deskripsi_kepengurusan','deskripsi_tentang',
        'periode_keanggotaan'
    ];
}
