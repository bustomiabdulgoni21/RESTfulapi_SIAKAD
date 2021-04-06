<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_kelas';

    protected $foreignKey = 'id_guru';

    protected $fillable = ['id_kelas','tingkat','jurusan','tahun_ajar','id_guru'];
}
