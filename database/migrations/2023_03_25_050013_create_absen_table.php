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
            $table->string('absen_masuk')->nullable();
            $table->string('absen_pulang')->nullable();
            $table->enum('status_absen', ['hadir','alpa','sakit','izin'])->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
           // $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('siswa_id')->nullable();
            // $table->enum('di','proses','tolak')->default(false);
            $table->enum('approve', ['Diterima','Ditolak'])->nullable();
            $table->date('izin_dari')->nullable();
            $table->date('izin_sampai')->nullable();

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
        // Schema::dropIfExists('absen');
        Schema::table('absen', function (Blueprint $table) {
            $table->dropColumn('approve');
        });
    }
}
