<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $primaryKey = 'nik';

    protected $fillable = [
        'nik',
        'nisn',
        'nama_lengkap',
        'jk',
        'agama',
        'tempat_lahir', 
        'tgl_lahir',
        'alamat',
        'ayah',
        'ibu',
        'pekerjaan_ayah',
        'pekerjaan_ibu',
        'no_hp',
        'email',
         'tahun_masuk'
     ];
}
