<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KegiatanSelesai extends Model {
    use HasFactory;
    protected $table = 'kegiatan_selesais';
    protected $primaryKey = 'id';
    protected $fillable = ['img', 'title', 'deskripsi','url'];
}

