<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Galeria extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galerias', function(Blueprint $table){
            $table->increments('idgaleria');
            $table->string('foto',40);
            $table->string('descripcion',255);
            
            $table->integer('idservicio')->unsigned();
            $table->foreign('idservicio')->references('idservicio')->on('servicios');


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
        Schema::drop('galerias');
    }
}
