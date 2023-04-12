<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBidang extends Model
{
    use HasFactory;
    protected $table = 'data_bidang';

    protected $fillable = [
    	'id',
        'nama_bidang',
        'jenis_jurusan',
    ];
}
