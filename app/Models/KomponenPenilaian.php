<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenPenilaian extends Model
{
    use HasFactory;

    protected $table = 'komponen_penilaian';

    protected $fillable = ['disiplin_waktu', '	inisatif_dan_kreatifitas', 'sikap_dan_disiplin', 'operating_system', 'ms_office', 'instalasi_sistem'];
}
