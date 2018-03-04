<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id', true);
            $table->char('id_public', 5)->unique(); 
            $table->string('nom');
            $table->string('prenom');
            $table->string('email')->unique();
            $table->string('avatar')->nullable()->default('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTUdFBZbl_qSONKU9QF_c_hIIpEJON0YLUnbLWQy78kLfa_rwZs_g');
            $table->date('date_naissance');
            $table->string('pseudo')->nullable();
            $table->string('ville')->nullable();
            $table->string('description')->nullable()->default("Aucune description...");
            $table->string('adresse')->nullable();
            $table->string('password');
            $table->string('type');
            $table->boolean('admin')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
