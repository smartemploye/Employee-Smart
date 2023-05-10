<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataMagang;


class DatamagangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[

        'pendaftaran_id'  => '1',
        'admin_berkas_id' => '1',
        'admin_wawancara_id' => '1',
        'bidang_id' => '1',
        'admin_pembayaran_id' => '1',
        'nisn' => '1234567890',
        'paket_id' => '1',
        'surat_pengajuan' => '19052001',
        'paket_magang' => 'exclusive',
        'tanggal_pembayaran' => '2023-05-31',
        'judul_project' => 'magang',
        'no_sertifikat' => '1234567',
        'status_magang' => 'aktif',
        'status_seleksi' => 'diterima',
        'ukuran_baju' => 'L',
        'nilai_akhir' => '100',
        'bukti_pembayaran' => '1234567',
        ]];
        DataMagang::insert(
            $data
        );
    }
}
