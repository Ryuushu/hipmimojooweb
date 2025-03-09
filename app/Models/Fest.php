<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fest extends Model
{
    use HasFactory;
    protected $table = 'fest';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_fest',
        'deskripsi_fest',
        'jadwal_fest',
        'lokasi',
        'rangkaian_acara',
    ];
}
