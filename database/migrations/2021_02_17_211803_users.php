<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('idusuaio');
            $table->string('nombre', 40);
            $table->string('app', 40);
            $table->string('apm', 40);
            $table->string('email', 40);
            $table->string('contraseña', 255);
            $table->string('sexo', 1);
            $table->string('celular', 10);
            $table->string('ciudad', 255);
            $table->string('calle', 255);
            $table->string('nocalle', 5);
            $table->string('cp', 5);

            $table->integer('idtipoususario')->unsigned();
            $table->foreign('idtipoususario')->references('idtipoususario')->on('typeusers');

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
        Schema::drop('users');
    }
}
