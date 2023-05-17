<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EditColumnToPenilaian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $oldColumn;
    protected $newColumn;

    public function __construct()
    {
        $this->oldColumn = Session::get('oldColumn');
        $this->newColumn = Session::get('newColumn');
    }
    public function up()
    {
        // if ($this->oldColumn !== '') {
        //     # code...

        //     Schema::table('penilaian', function (Blueprint $table) {
        //         $table->bigInteger($this->newColumn);
        //     });
        // }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if ($this->oldColumn !== '') {
            Schema::table('penilaian', function (Blueprint $table) {

                $table->dropColumn($this->oldColumn);
            });
        }
    }
}
