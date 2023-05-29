<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;


class CreateSettingMagangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_magang', function (Blueprint $table) {
            $table->id();
            $table->time('jam_Masuk_kerja');
            $table->time('jam_Pulang_kerja');
            $table->bigInteger('no_va');
            $table->bigInteger('Kuota_Magang');
            $table->text('Format_WA_Diterima')->nullable();
            $table->text('Format_WA_Ditolak')->nullable();
            $table->text('Format_Pembimbing')->nullable();
            $table->text('Format_Email')->nullable();
            $table->bigInteger('WA_Kantor');
            $table->string('Sertifikat')->nullable();
            // $table->string('periode_magang');
            // $table->integer('kuota_magang');
            $table->timestamps();
        });
        Artisan::call('db:seed', ['--class' => 'DatabaseSeeder']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_magang');
    }
}
