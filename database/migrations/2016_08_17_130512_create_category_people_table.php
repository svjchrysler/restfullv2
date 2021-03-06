<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryPeopleTable extends Migration
{
    public function up()
    {
        Schema::create('category_people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre_encuestador');
            $table->integer('hombre');
            $table->integer('ninia');
            $table->integer('mujer');
            $table->integer('anciano');
            $table->integer('ninio');
            $table->string('calle_relevamiento');
            $table->string('calle_lateral_a');
            $table->string('calle_lateral_b');
            $table->string('hora_inicio');
            $table->string('fecha');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('category_people');
    }
}
