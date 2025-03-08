<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model {
    use HasFactory;
    protected $table = 'beritas';
    protected $primaryKey = 'id';
    protected $fillable = ['thumbnail', 'title', 'kontent', 'date', 'kategori_berita_id'];

    public function kategori() {
        return $this->belongsTo(KategoriBerita::class, 'kategori_berita_id');
    }
}
