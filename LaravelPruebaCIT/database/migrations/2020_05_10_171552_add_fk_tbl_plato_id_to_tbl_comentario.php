<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkTblPlatoIdToTblComentario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('TBL_Comentario', function (Blueprint $table) {
            $table->integer('plato_id')->unsigned()->after('descripcion');
            $table->foreign('plato_id')->references('id')->on('TBL_Plato');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('TBL_Comentario', function (Blueprint $table) {
            //
        });
    }
}
