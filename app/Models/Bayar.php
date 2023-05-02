<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bayar extends Model
{
    use HasFactory;

    protected $table = 'bayar';
    protected $fillable = ['bukti'];

    // protected $table = 'setting_magang';

    // protected $fillable = ['jam_Masuk_kerja', 'jam_Pulang_kerja', 'no_va', 'Kuota_Magang', 'Format_WA_Diterima', 'Format_WA_Ditolak', 'Format_Email', 'WA_Kantor'];
}
