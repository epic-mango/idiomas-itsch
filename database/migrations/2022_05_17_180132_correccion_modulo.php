<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorreccionModulo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modulos', function (Blueprint $table) {
            $table->string('ID_MODULO',9)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modulos', function (Blueprint $table) {
            $table->string('ID_MODULO',8)->change();
        });
    }
}
