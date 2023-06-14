<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingMagang;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // ...
        $siswa = DB::table('siswa')->first(); // Ambil data siswa pertama

        $settingMagang = SettingMagang::create([
            'jam_Pulang_kerja' => '10:00',
            'jam_Masuk_kerja' => '07:00',
            'no_va' => '7987488',
            'Kuota_Magang' => '50',
            'Format_WA_Diterima' =>  ', Selamat!!! kamu telah dinyatakan lulus seleksi dalam pendaftaran magang di PT Garuda Cyber Indonesia
            Silahkan melakukan pembayaran dengan nomor rekening berikut:
            Nomor Rekening : $nomorrekeninggarudacyberindonesia
            Nominal       : $berdasarkan jenis paket magang yang dipilih nominalnya
            Silahkan lakukan login untuk mengupload bukti pembayaran dengan akun:
            Username : $alamat email siswa
            Password : $password yang sudah diinput pada saat registrasi
            Selamat bergabung!!!',

            'Format_WA_Ditolak' =>  ', Mohon maaf, kamu dinyatakan belum lulus dalam seleksi pendaftaran magang di PT Garuda Cyber Indonesia
            Silahkan melakukan pendaftaran dan seleksi ulang untuk mendaftar magang kembali',

            'Format_Pembimbing' => ', Selamat!!! murid anda telah dinyatakan lulus seleksi dalam pendaftaran magang di PT Garuda Cyber Indonesia
            Silahkan masuk ke dalam sistem smart internship kami untuk melakukan pemantauan terhadap kegiatan murid anda selama kegiatan magang
            di PT Garuda Cyber Indonesia dengan akun berikut:
            Username : $NIPPembimbing
            Password : 123 (Silahkan lakukan penggantian password saat sudah melakukan login)',

            'Format_Email' => 'Selamat!!! email anda telah terdaftar untuk melakukan pendaftaran magang di PT Garuda Cyber Indonesia',

            'WA_Kantor' => '993474',
        ]);
        // ...
    }
}
