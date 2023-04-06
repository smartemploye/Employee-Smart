<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    protected $table = 'absen';

    protected $fillable = [
        'id',
        'admin_id',
        'nisn',
        'absen_masuk',
        'absen_pulang',
        'status_absen',
        'keterangan',
        'izin_dari',
        'izin_sampai',
        'approve',
    ];
}
