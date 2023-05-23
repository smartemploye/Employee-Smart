<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Akun extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'akun';

    protected $table = "akuns";
    protected $fillable = [
        'username',
        'password',
        'status',
        'nisn',
        'role',
        'nip_pembimbing'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function siswa()
    {

        return $this->hasOne(Siswa::class, 'nisn', 'nisn');
    }

    public function pembimbing()
    {

        return $this->hasOne(Pembimbing::class, 'nip_pembimbing', 'username');
    }


}
