<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    use HasFactory;
    protected $table = 'divisi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'bidang',
        'nama_devisi'
    ];
    public function proker()
    {
        return $this->hasMany(Proker::class, 'devisi_id');
    }
    public function anggotaPengurus() {
        return $this->hasMany(AnggotaPengurus::class, 'devisi_id');
    }
}
