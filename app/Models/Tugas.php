<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = 'tugas';
    protected $fillable = [
        'mata_kuliah',
        'judul_tugas',
        'deskripsi',
        'deadline',
        'status'
    ];
}
