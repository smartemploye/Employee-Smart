<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataBidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_bidang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bidang')->nullable();
            $table->enum('jenis_jurusan', ['IT','Umum'])->nullable();
            $table->string('nisn')->nullable()->unique();
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
        Schema::dropIfExists('data_bidang');
    }
}
