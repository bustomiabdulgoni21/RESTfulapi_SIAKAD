<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class absen extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_absen';

    protected $foreignKey = ['id_rombel','nik'];

    protected $fillable = [
        'id_absen',
        'nik',
        'absensi',
        'id_rombel',
        'tgl_hadir',
        'ket',
        'smst'
    ];
}
