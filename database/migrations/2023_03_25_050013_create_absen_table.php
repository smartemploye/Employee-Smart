<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absen', function (Blueprint $table) {
            $table->id();
            $table->string('absen_masuk');
            $table->string('absen_pulang');
            $table->enum('status_absen', ['sakit','izin']);
            $table->text('keterangan');
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
        Schema::dropIfExists('absen');
    }
}
