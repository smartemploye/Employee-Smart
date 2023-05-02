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
            $table->text('logbook');
            $table->date('tanggal_logbook');
            $table->string('dokumentasi')->nullable();
            $table->unsignedBigInteger('admin_id');
           // $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('siswa_id');
           // $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
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
