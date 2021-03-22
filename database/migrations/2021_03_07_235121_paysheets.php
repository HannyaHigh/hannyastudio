<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paysheets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paysheets', function (Blueprint $table) {
            $table->increments('idpaysheet');
            $table->string('date', 40);
            $table->string('amount', 40);
            $table->string('workeddays', 40);

            $table->integer('idusuaio')->unsigned();
            $table->foreign('idusuaio')->references('idusuaio')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('paysheets');
    }
}
