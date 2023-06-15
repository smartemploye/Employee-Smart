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
<<<<<<< HEAD
            $table->string('username', 191);
            $table->string('password', 256);
            $table->enum('status', ['aktif', 'tidak aktif'])->nullable();
            $table->enum('level', ['1', '2', '3'])->nullable();
            $table->string('nisn', 10)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('nip_pembimbing')->nullable();
            $table->string('role');
=======
            $table->string('username', 191)->nullable()->unique();
            $table->string('password', 256)->nullable();
            $table->string('nisn', 10)->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('nip_pembimbing')->nullable()->unique();
            $table->enum('role', ['admin', 'siswa', 'pembimbing'])->nullable();
>>>>>>> 8c4c72b094c42ee4bab38b6c00aa4d9cc6746667

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
