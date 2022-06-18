<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinPenelitian extends Model
{
    use HasFactory;
    protected $table = 'surat_izin_penelitian';
    protected $primaryKey = 'id_user';
}
