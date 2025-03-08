<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriBerita extends Model {
    use HasFactory;
    protected $table = 'kategori_beritas';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_kategori'];
}
