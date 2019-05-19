<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneroLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genero_libro', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('libro_id')->unsigned();
            $table->integer('genero_id')->unsigned();
            $table->timestamps();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->foreign('libro_id')->references('id')->on('libros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genero_libro');
    }
}
