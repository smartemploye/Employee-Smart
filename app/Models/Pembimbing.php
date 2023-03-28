<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $table = 'pembimbing';
    protected $fillable = [
    	'id',
        'nip_pembimbing',
        'nama_pembimbing',
        'no_wa_pembimbing',
        'format_laporan_akhir',
        'sekolah_id',
    ];
}
