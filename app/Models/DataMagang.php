<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataMagang extends Model
{
    use HasFactory;
    protected $table = 'data_magang';

    protected $fillable = [
    	'id',
        'pendaftaran_id',
        'admin_berkas_id',
        'admin_wawancara_id',
        'bidang_id',
        'admin_pembayaran_id',
        'nisn',
        'paket_id',
        'surat_pengajuan',
        'paket_magang',
        'tanggal_pembayaran',
        'judul_project',
        'no_sertifikat',
        'status_magang',
        'ukuran_baju',
        'nilai_akhir',
        'bukti_pembayaran'
    ];
}
