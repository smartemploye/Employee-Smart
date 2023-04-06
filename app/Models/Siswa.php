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
        'tanggal_masuk',
        'tanggal_selesai',
        'nip_pembimbing',
        'foto_siswa',
    ];
}
