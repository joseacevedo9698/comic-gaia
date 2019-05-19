<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {

            // Atributos de la tabla libros
            $table->Increments('id');
            $table->integer('titulo_id')->unsigned();
            $table->integer('idioma_id')->unsigned();
            $table->integer('editorial_id')->unsigned();
            $table->integer('tipo_id')->unsigned();
            $table->dateTime('ano_public');
            $table->integer('ejemplares');
            $table->integer('volumen');
            $table->string('img_path');
            $table->string('sinopsis');
            $table->timestamps();
            
            $table->foreign('titulo_id')->references('id')->on('titulos')->onDelete('cascade');
            $table->foreign('idioma_id')->references('id')->on('idiomas')->onDelete('cascade');
            $table->foreign('editorial_id')->references('id')->on('editorials')->onDelete('cascade');
            $table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
