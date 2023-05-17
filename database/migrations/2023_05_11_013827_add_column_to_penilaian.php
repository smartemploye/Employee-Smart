<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\KomponenPenilaian;

class AddColumnToPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $data;
    public function __construct()
    {
        $this->data = KomponenPenilaian::all();
    }
    public function up()
    {
        // if ($this->data->count() > 0) {
        //     Schema::table('penilaian', function (Blueprint $table) {
        //         foreach ($this->data as $key) {
        //             if (!Schema::hasColumn('penilaian', $key->nama_komponen)) {
        //                 $table->bigInteger($key->nama_komponen)->nullable();
        //             }
        //         }
        //         //
        //     });
        // }
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ($this->data->count() > 0) {
            Schema::table('penilaian', function (Blueprint $table) {
                foreach ($this->data as $key) {
                    if (Schema::hasColumn('penilaian', $key->nama_komponen)) {
                        $table->dropColumn($key->nama_komponen);
                    }
                }
            });
        }
    }
}
