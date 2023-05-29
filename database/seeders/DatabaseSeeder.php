<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SettingMagang;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        SettingMagang::create([

            'jam_Pulang_kerja' => '10:00',
            'jam_Masuk_kerja' => '07:00',
            'no_va' => '7987488',
            'Kuota_Magang' => '50',
            'Format_WA_Diterima' => 'Selamat anda diterima',
            'Format_WA_Ditolak' => 'Maaf anda belum beruntung',
            'Format_Pembimbing' => 'Halo Pembimbing',
            'Format_Email' => 'Selamat Malam',
            'WA_Kantor' => '993474',
        ]);
    }
}
