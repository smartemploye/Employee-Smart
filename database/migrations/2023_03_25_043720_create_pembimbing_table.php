<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembimbingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembimbing', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nip_pembimbing');
            $table->string('nama_pembimbing');
            $table->string('no_wa_pembimbing');
            $table->string('format_laporan_akhir')->nullable();
            $table->unsignedBigInteger('sekolah_id');
           // $table->foreign('sekolah_id')->references('id')->on('sekolah')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pembimbing');
    }
}
