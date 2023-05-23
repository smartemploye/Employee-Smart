<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $guard = 'pembimbing';
    protected $table = 'pembimbing';

    protected $fillable = [
    	'id',
        'nip_pembimbing',
        'nama_pembimbing',
        'no_wa_pembimbing',
        'format_laporan_akhir',
        'sekolah_id',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function akun()
    {

        return $this->belongsTo(Akun::class, 'username', 'username');
    }
}
