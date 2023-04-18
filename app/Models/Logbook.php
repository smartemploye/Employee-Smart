<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class logbook extends Model
{
    use HasFactory;

    protected $table = 'kegiatan_harian';

    protected $fillable = ['logbook', 'tanggal_logbook', 'dokumentasi', 'admin_id', 'siswa_id'];

    public function Admin()
    {
        
        return $this->belongsTo(admin::class, 'admin_id');
    }

    public function siswa()
    {
        
        return $this->belongsTo(siswa::class, 'siswa_id');
    }

    // public function Siswa()
    // {
    //     return $this->hasMany(siswa::class, 'siswa_id');
    // }

}