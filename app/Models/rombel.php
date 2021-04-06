<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rombel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_rombel';

    protected $foreignKey = ['nik','id_kelas'];

    protected $fillable = ['id_rombel','nik','id_kelas'];
}
