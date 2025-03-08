<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnggotaPengurus extends Model
{
    use HasFactory;
    protected $table = 'anggota_pengurus';
    protected $primaryKey = 'id';
    protected $fillable = [
        'devisi_id', 'nama_anggota', 'jabatan', 'img'
    ];
    public function devisi() {
        return $this->belongsTo(Divisi::class, 'devisi_id');
    }
}
