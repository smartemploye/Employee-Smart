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
            $table->bigInteger('nip_pembimbing')->nullable()->unique();
            $table->string('nama_pembimbing')->nullable();
            $table->string('no_wa_pembimbing')->nullable()->unique();
            $table->string('format_laporan_akhir')->nullable();
            $table->unsignedBigInteger('sekolah_id')->nullable();
            $table->string('password')->nullable();
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
