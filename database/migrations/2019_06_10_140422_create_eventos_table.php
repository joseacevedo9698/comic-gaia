<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $value = asset('images/empty-img.png');
            $table->Increments('id');
            $table->String('Nombre');
            $table->date('Fecha_inicio');
            $table->date('Fecha_final');
            $table->time('Hora_apertura');
            $table->time('Hora_cierre')->nullable();
            $table->String('Lugar');
            $table->String('img_path')->default($value);
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
        Schema::dropIfExists('eventos');
    }
}
