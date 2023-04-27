<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingMagang extends Model
{
    use HasFactory;

    protected $table = 'setting_magang';

    protected $fillable = ['jam_Masuk_kerja', 'jam_Pulang_kerja', 'no_va', 'Format_WA_Diterima', 'Format_WA_Ditolak', 'Format_Email', 'WA_Kantor'];

    public function Admin()
    {
        
        return $this->belongsTo(admin::class, 'admin_id');
    }

    public function Bayar()
    {
        
        return $this->belongsTo(bayar::class, 'bayar_id');
    }

    // public function Siswa()
    // {
    //     return $this->hasMany(siswa::class, 'siswa_id');
    // }

}
