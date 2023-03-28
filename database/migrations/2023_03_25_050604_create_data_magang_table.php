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
            $table->integer('pendaftaran_id');
            $table->bigInteger('admin_berkas_id');
            $table->bigInteger('admin_wawancara_id');
            $table->bigInteger('bidang_id');
            $table->bigInteger('admin_pembayaran_id');
            $table->bigInteger('nisn');
            $table->bigInteger('paket_id');
            $table->string('surat_pengajuan');
            $table->enum('paket_magang', ['basic','exclusive']);
            $table->date('tanggal_pembayaran');
            $table->string('judul_project');
            $table->string('no_sertifikat');
            $table->enum('status_magang', ['aktif','tidak aktif']);
            $table->enum('status_seleksi', ['diproses','diterima','ditolak']);
            $table->enum('ukuran_baju', ['S','M','L','XL','XXL']);
            $table->integer('nilai_akhir');
            $table->string('bukti_pembayaran');
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
