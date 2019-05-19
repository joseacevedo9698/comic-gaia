<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->Increments('id');
            $table->String('nombre');
            $table->string('descripcion', 100)->nullable()->default('Sin Descripción');
            $table->integer('tipo_id')->unsigned();
            $table->double('precio', 20, 8);
            $table->timestamps();
            $table->foreign('tipo_id')->references('id')->on('producto_tipos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
