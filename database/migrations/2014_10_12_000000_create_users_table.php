<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nisn')->unique();;
            $table->enum('asal_sekolah', ['SMA 1', 'SMA 2']);
            $table->string('jenis_jurusan');
            $table->string('nama_jurusan');
            $table->string('paket_magang');
            $table->date('tanggal_lahir');
            $table->string('nip_pembimbing');
            $table->enum('ukuran_baju', ['S','M','L','XL','XXL']);
            $table->string('photo')->nullable();
            $table->string('surat_pengajuan')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ulangi_password');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        User::create([
            // 'name'=> 'admin',
            // 'email'=> 'admin@gmail.com',
            // 'email_verified_at'=> now(),
            // 'password'=> Hash::make('12345678'),
            // 'rememberToken' => Str::random(10)
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
