<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_mapel';

    protected $fillable = ['id_mapel','nama_pel','kkm','jenis'];
}
