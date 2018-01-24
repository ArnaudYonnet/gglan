<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipe', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom_equipe');
            $table->string('desc_equipe')->default('Aucune description...');
            $table->integer('id_jeu');
        });
        
        Schema::table('equipe', function (Blueprint $table) {
            $table->foreign('id_jeu')
                  ->references('id')->on('jeu')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipe');
    }
}
