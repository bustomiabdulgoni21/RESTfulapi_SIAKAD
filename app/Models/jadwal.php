<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jadwal extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_jadwal';

    protected $foreignKey = ['id_kelas','id_mapel','id_guru'];

    protected $fillable = ['id_jadwal','id_kelas','id_mapel','hari','jam','id_guru'];
}
