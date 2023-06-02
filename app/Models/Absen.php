<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'absen';
    protected $fillable = ['absen_masuk', 'absen_pulang', 'siswa_id','status_absen', 'nisn','izin_dari','izin_sampai','keterangan' , 'dokumentasi'];
}
