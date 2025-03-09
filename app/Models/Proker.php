<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proker extends Model
{
    use HasFactory;
    protected $table = 'proker';
    protected $primaryKey = 'id';
    protected $fillable = [
        'devisi_id',
        'ajuan_proker',
        'rencana_pelaksanaan',
        'progress',
        'monitoring_evaluasi'
    ];
    public function devisi()
    {
        return $this->belongsTo(Divisi::class, 'devisi_id');
    }
}
