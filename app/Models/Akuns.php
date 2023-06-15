<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Akuns extends Model
{
    use HasFactory;
    protected $table = 'akuns';

    protected $fillable = [
    	'id',
        'username',
        'password',
        'status',
        'level',
        'nisn',
        'role',
        'nip_pembimbing',
    ];
    public function siswa()
    {
        return $this->hasOne(Siswa::class, 'nisn', 'nisn');
    }
    public function akuns()
    {
        return $this->hasOne(akun::class, 'nisn', 'nisn');
    }
}
