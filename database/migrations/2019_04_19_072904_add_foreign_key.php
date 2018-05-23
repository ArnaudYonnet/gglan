<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('meetings', function (Blueprint $table){
            $table->foreign('admin_id')
                  ->references('id')->on('admins')
                  ->onDelete('cascade');
        });

        Schema::table('posts', function (Blueprint $table){
            $table->foreign('admin_id')
                  ->references('id')->on('admins')
                  ->onDelete('cascade');
        });

        Schema::table('teams', function (Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });

        // Schema::table('teams', function (Blueprint $table){
        //     $table->foreign('game_id')
        //           ->references('id')->on('games')
        //           ->onDelete('cascade');
        // });

        Schema::table('team_user', function (Blueprint $table){
            $table->foreign('team_id')
                  ->references('id')->on('teams')
                  ->onDelete('cascade');
        });

        Schema::table('team_user', function (Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });

        Schema::table('admins', function (Blueprint $table) {
            $table->foreign('role_id')
                  ->references('id')->on('roles')
                  ->onDelete('cascade');
        });

        Schema::table('tournaments', function (Blueprint $table) {
            $table->foreign('game_id')
                  ->references('id')->on('games')
                  ->onDelete('cascade');
        });

        Schema::table('team_tournament', function (Blueprint $table) {
            $table->foreign('team_id')
                  ->references('id')->on('teams')
                  ->onDelete('cascade');
        });

        Schema::table('team_tournament', function (Blueprint $table) {
            $table->foreign('tournament_id')
                  ->references('id')->on('tournaments')
                  ->onDelete('cascade');
        });

        Schema::table('game_user', function (Blueprint $table){
            $table->foreign('game_id')
                  ->references('id')->on('games')
                  ->onDelete('cascade');
        });

        Schema::table('game_user', function (Blueprint $table){
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
        });

        Schema::table('game_user', function (Blueprint $table){
            $table->foreign('rank_id')
                  ->references('id')->on('ranks')
                  ->onDelete('cascade');
        });

        Schema::table('ranks', function (Blueprint $table){
            $table->foreign('game_id')
                  ->references('id')->on('games')
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
        //
    }
}
