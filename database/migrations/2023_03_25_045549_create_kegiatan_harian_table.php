<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKegiatanHarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kegiatan_harian', function (Blueprint $table) {
            $table->id();
            $table->text('logbook')->nullable();
            $table->date('tanggal_logbook')->nullable();
            $table->string('dokumentasi')->nullable();
            $table->string('admin_id')->nullable();
            $table->string('siswa_id')->nullable();
            $table->string('nisn')->nullable();
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
        Schema::dropIfExists('kegiatan_harian');
    }
}
