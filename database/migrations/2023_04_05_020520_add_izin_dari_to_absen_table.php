<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Doctrine\DBAL\Types\Type;





class AddIzinDariToAbsenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement("ALTER TABLE absen MODIFY approve type ENUM('diapprove','proses','tolak') DEFAULT NULL");
        DB::statement("ALTER TABLE absen MODIFY COLUMN approve ENUM('diapprove','proses','tolak') DEFAULT NULL");

        Schema::table('absen', function (Blueprint $table) {
            $table->date('izin_dari')->nullable()->change();
            $table->date('izin_sampai')->nullable()->change();
            // $table->enum('approve', ['diapprove', 'proses', 'tolak'])->nullable()->change();
            // $table->type('approve')->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    // public function down()
    // {
    //     Schema::table('absen', function (Blueprint $table) {
    //         //
    //     });
    // }
}
