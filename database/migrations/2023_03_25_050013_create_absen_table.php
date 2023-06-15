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
            $table->string('nisn')->nullable()->unique();
            $table->string('siswa_id')->nullable();
            $table->string('absen_masuk')->nullable();
            $table->string('absen_pulang')->nullable();
<<<<<<< HEAD
            $table->enum('status_absen', ['hadir','alpa','sakit','izin'])->nullable();
            $table->text('keterangan')->nullable();
            $table->unsignedBigInteger('admin_id')->nullable();
           // $table->foreign('admin_id')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('siswa_id')->nullable();
            // $table->enum('di','proses','tolak')->default(false);
            $table->enum('approve', ['Diterima','Ditolak'])->nullable();
            $table->date('izin_dari')->nullable();
            $table->date('izin_sampai')->nullable();

=======
            $table->enum('status_absen', ['hadir','sakit','izin'])->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('approve', ['Diterima','Ditolak'])->nullable();
            $table->date('izin_dari')->nullable();
            $table->date('izin_sampai')->nullable();
            $table->string('nama_siswa')->nullable();
            $table->string('dokumentasi')->nullable();


        
>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667
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
