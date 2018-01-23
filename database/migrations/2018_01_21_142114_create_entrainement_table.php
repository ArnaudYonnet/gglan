<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntrainementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entrainement', function (Blueprint $table) {
            $table->integer('id_jeu');
            $table->integer('id_user');
            $table->char('niveau_joueur');
        });
        
        Schema::table('entrainement', function (Blueprint $table) {
            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            
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
        Schema::dropIfExists('entrainement');
    }
}
