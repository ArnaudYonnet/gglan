<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournoisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournois', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nom_tournois');
            $table->date('date_deb');
            $table->date('date_fin');
            $table->string('description');
            $table->integer('place_equipe');
            $table->integer('id_salle')->nullable();
            $table->integer('id_jeu')->nullable();
            $table->string('status')->default('ouvert');
        });
        
        Schema::table('tournois', function (Blueprint $table) {
            $table->foreign('id_jeu')
                  ->references('id')->on('jeu')
                  ->onDelete('cascade');

            $table->foreign('id_salle')
                  ->references('id')->on('salle')
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
        Schema::dropIfExists('tournois');
    }
}
