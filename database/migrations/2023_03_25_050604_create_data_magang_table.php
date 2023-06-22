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
            $table->enum('status_magang', ['Seleksi','Belum Bayar', 'Aktif', 'Lulus', 'Ditolak', 'Drop Out'])->nullable();
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
