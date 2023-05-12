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
            $table->integer('pendaftaran_id')->nullable();
            $table->unsignedBigInteger('admin_berkas_id')->nullable();
          //  $table->foreign('admin_berkas_id')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('admin_wawancara_id')->nullable();
          //  $table->foreign('admin_wawancara_id')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('data_bidang_id')->nullable();
          //  $table->foreign('data_bidang_id')->references('id')->on('data_bidang')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('admin_pembayaran_id')->nullable();
          //  $table->foreign('admin_pembayaran_id')->references('id')->on('admin')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('siswa_id')->nullable();
          //  $table->foreign('siswa_id')->references('id')->on('siswa')->onDelete('cascade')->onUpdate('cascade');
            $table->string('surat_pengajuan')->nullable();
            $table->enum('paket_magang', ['basic','exclusive'])->nullable();
            $table->date('tanggal_pembayaran')->nullable();
            $table->string('judul_project')->nullable();
            $table->string('no_sertifikat')->nullable();
            // $table->enum('status_magang', ['aktif','tidak aktif'])->nullable();
            // $table->enum('status_seleksi', ['diproses','diterima','ditolak'])->nullable();
            $table->enum('ukuran_baju', ['S','M','L','XL','XXL'])->nullable();
            $table->integer('nilai_akhir')->nullable();
            $table->string('bukti_pembayaran')->nullable();
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
