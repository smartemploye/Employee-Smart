<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\KomponenPenilaian;

class CreatePenilaianTable extends Migration
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
        Schema::create('penilaian', function (Blueprint $table) {
            $table->id('id_penilaian')->nullable();
            $table->bigInteger('id_siswa')->nullable();
            $table->timestamps();
            if ($this->data->count() > 0) {
                foreach ($this->data as $komponen) {
                    $table->bigInteger($komponen->nama_komponen);
                }
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaian');
    }
}
