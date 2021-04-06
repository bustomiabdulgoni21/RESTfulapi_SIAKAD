<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_nilai';

    protected $foreignKey = [
        'jadwal_id',
        'rombel_id'
    ];

    protected $fillable = [
        'id_nilai',
        'nik',
        'jadwal_id',
        'smst',
        'angka',
        'kalimat',
        'rombel_id',
        'deskripsi'
    ];
}
