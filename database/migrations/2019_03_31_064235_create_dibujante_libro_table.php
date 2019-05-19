<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDibujanteLibroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dibujante_libro', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('libro_id')->unsigned();
            $table->integer('dibujante_id')->unsigned();
            $table->timestamps();
            $table->foreign('dibujante_id')->references('id')->on('dibujantes')->onDelete('cascade');
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
        Schema::dropIfExists('dibujante_libro');
    }
}
