<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guru extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_guru';

    protected $foreignKey = 'id_jabatan';

    protected $fillable = [

    	'id_guru',
    	'nama_guru',
    	'id_jabatan',
    	'tempat',
    	'tgl_lahir',
    	'jk',
    	'agama',
    	'no_telp',
    	'alamat',
    	'username',
    	'password'

    ];
}
