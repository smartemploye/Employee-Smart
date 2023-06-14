<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAkunsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('akuns', function (Blueprint $table) {
            $table->id();
            $table->string('username', 191)->nullable()->unique();
            $table->string('password', 256)->nullable();
            $table->string('nisn', 10)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('nip_pembimbing')->nullable()->unique();
            $table->enum('role', ['admin', 'siswa', 'pembimbing'])->nullable();

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
        Schema::dropIfExists('akuns');
    }
}
