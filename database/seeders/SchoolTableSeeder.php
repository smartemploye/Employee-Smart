<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sekolah;

class SchoolTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'nama_sekolah' => 'SMK 1',
            'alamat_sekolah' => 'Jalan 1',
            'nis' => '1234567'
        ], [
            'nama_sekolah' => 'SMK 2',
            'alamat_sekolah' => 'Jalan 2',
            'nis' => '1234567'
        ], [
            'nama_sekolah' => 'SMK 3',
            'alamat_sekolah' => 'Jalan 3',
            'nis' => '1234567'
        ]];
        Sekolah::insert(
            $data
        );
    }
}
