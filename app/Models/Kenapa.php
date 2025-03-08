<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kenapa extends Model {
    use HasFactory;
    protected $table = 'kenapas';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'deskripsi'];
}

