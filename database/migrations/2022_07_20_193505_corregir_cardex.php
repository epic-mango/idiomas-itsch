<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CorregirCardex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cardexes', function (Blueprint $table) {
            $table->string('CARDEX_ID_MODULO', 9)->change();
            $table->renameColumn('CARDEX_ID_CALIFICACION', 'CARDEX_CALIFICACION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cardexes', function (Blueprint $table) {
            $table->string('ID_MODULO', 6)->change();
            $table->renameColumn('CARDEX_CALIFICACION', 'CARDEX_ID_CALIFICACION');
        });
    }
}
