<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participation', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_equipe');
            $table->integer('id_tournois');
        });
        
        Schema::table('participation', function (Blueprint $table) {
            $table->foreign('id_equipe')
                  ->references('id')->on('equipe')
                  ->onDelete('cascade');
    
            $table->foreign('id_tournois')
                  ->references('id')->on('tournois')
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
        Schema::dropIfExists('participation');
    }
}
