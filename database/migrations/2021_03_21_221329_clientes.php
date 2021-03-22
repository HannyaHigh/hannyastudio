<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    
    public function up()
    {
        Schema::create('clientes', function(Blueprint $table){
            $table->increments('idcliente');
            $table->string('nombrec',255);
            $table->string('apellidopa',255);
            $table->string('apellidoma',255);
            $table->string('sexo',40);
            $table->string('telefono',255);
            $table->string('correo',255);
            $table->string('contraseña',255);
            $table->string('ciudad',255);
            $table->string('calle',255);
            $table->string('nocalle',255);
            $table->string('CP',255);
            $table->string('img',255);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('clientes');
    }
}
