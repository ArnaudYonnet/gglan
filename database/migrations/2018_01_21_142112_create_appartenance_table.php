<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppartenanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appartenance', function (Blueprint $table) {
            $table->integer('id_equipe');
            $table->integer('id_user');
        });
        
        Schema::table('appartenance', function (Blueprint $table) {
            $table->foreign('id_user')
                  ->references('id_user')->on('users')
                  ->onDelete('cascade');
        
            $table->foreign('id_equipe')
                  ->references('id_equipe')->on('equipe')
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
        Schema::dropIfExists('appartenance');
    }
}
