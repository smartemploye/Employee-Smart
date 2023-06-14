<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswa';

    protected $fillable = [
    	'id',
        'nama_siswa',
        'nisn',
        'no_wa',
        'sekolah_id',
        'jurusan',
        'tanggal_lahir',
        'tanggal_mulai',
        'tanggal_selesai',
        'nip_pembimbing',
        'foto_siswa',
        'keterangan'
    ];

    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nisn', 'nisn');
    }
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id', 'id');
    }
    public function pembimbing()
    {
        return $this->hasOne(pembimbing::class, 'nip_pembimbing', 'nip_pembimbing');
    }
    public function akun()
    {
        return $this->hasOne(akun::class, 'nisn', 'nisn');
    }
    public function data_magang()
    {
        return $this->hasOne(DataMagang::class, 'nisn', 'nisn');
    }
    public function akuns()
    {
        return $this->hasOne(akun::class, 'nisn', 'nisn');
    }

}
