<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    use HasFactory;

   	protected $primaryKey = 'id_jabatan';

   	protected $fillable = ['id_jabatan','nama_jabatan'];
}
