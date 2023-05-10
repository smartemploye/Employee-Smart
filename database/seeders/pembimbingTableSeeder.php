<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pembimbing;

class pembimbingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'nip_pembimbing' => '55',
            'nama_pembimbing' => 'miftah',
            'no_wa_pembimbing' => '08214963587',
            'format_laporan_akhir' => 'asdad',
            'sekolah_id' => '2',
        ]];
        Pembimbing::insert(
            $data
        );
    }
}
