<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KomponenPenilaian extends Model
{
    use HasFactory;

    protected $table = 'komponen_penilaian';

    protected $fillable = ['nama_komponen', 'presentase',];

    public function Penilaian()
    {
        return $this->hasOne(Penilaian::class);
    }
}
