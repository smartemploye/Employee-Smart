<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_magang', function (Blueprint $table) {
            $table->id();
          //  $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('surat_pengajuan')->nullable();
            $table->enum('paket_magang', ['basic','exclusive'])->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('judul_project')->nullable();
<<<<<<< HEAD
            $table->string('no_sertifikat')->nullable();
            // $table->enum('status_magang', ['aktif','tidak aktif'])->nullable();
            // $table->enum('status_seleksi', ['diproses','diterima','ditolak'])->nullable();
            $table->enum('status_magang', ['seleksi','Belum Bayar','Aktif','Lulus','Drop Out']);
=======
            $table->enum('status_magang', ['Seleksi','Belum Bayar', 'Aktif', 'Lulus', 'Drop Out'])->nullable();
>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667
            $table->enum('ukuran_baju', ['S','M','L','XL','XXL'])->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('nisn')->nullable()->unique();
            $table->string('bidang_id')->nullable();
            $table->string('laporan_akhir')->nullable();
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
        Schema::dropIfExists('data_magang');
    }
}
