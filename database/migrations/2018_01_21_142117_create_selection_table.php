<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSelectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selection', function (Blueprint $table) {
            $table->integer('id_jeu');
            $table->integer('id_tournois');
        });
        
        Schema::table('selection', function (Blueprint $table) {
            $table->foreign('id_jeu')
                  ->references('id_jeu')->on('jeu')
                  ->onDelete('cascade');
    
            $table->foreign('id_tournois')
                  ->references('id_tournois')->on('tournois')
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
        Schema::dropIfExists('selection');
    }
}
