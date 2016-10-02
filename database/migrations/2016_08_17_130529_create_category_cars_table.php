<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_encuestador');
            $table->integer('particular');
            $table->integer('bicicleta');
            $table->integer('motocicleta');
            $table->integer('taxi');
            $table->integer('publico');
            $table->integer('repartidor');
            $table->string('calle_relevamiento');
            $table->string('calle_lateral_a');
            $table->string('calle_lateral_b');
            $table->string('hora_inicio');
            $table->string('fecha');
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
        Schema::drop('category_cars');
    }
}
