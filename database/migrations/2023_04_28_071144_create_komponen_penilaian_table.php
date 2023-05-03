<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomponenPenilaianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komponen_penilaian', function (Blueprint $table) {
            $table->id();
            //Nilai Kepribadian
            $table->string('penilaian_kepribadian');
            $table->bigInteger('disiplin_waktu');
            $table->bigInteger('inisatif_dan_kreatifitas');
            $table->bigInteger('sikap_dan_disiplin');

            //Penialaian Keahlian
            $table->string('penilaian_keahlian');
            $table->bigInteger('operating_system');
            $table->bigInteger('ms_office');
            $table->bigInteger('instalasi_sistem');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('komponen_penilaian');
    }
}
