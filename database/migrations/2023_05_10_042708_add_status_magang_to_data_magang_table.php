<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusMagangToDataMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_magang', function (Blueprint $table) {
            $table->enum('status_magang', ['seleksi','Belum Bayar','Aktif','Lulus','Drop Out']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('data_magang', function (Blueprint $table) {
            //
        });
    }
}
