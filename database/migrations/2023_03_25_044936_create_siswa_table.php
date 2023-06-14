<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nisn',10)->nullable()->unique();
            $table->string('nama_siswa');
            $table->string('no_wa')->nullable()->unique();
            $table->unsignedBigInteger('sekolah_id');
          //  $table->foreign('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade')->onUpdate('cascade');
            $table->string('jurusan');
            $table->unsignedBigInteger('nip_pembimbing')->unique();
          //  $table->foreign('nip_pembimbing')->references('id')->on('pembimbing')->onDelete('cascade')->onUpdate('cascade');
            $table->string('foto_siswa');
            $table->date('tanggal_mulai')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('keterangan')->nullable();
            $table->date('tanggal_lahir');
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
        Schema::dropIfExists('siswa');
    }
}
