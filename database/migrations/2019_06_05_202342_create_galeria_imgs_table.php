<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaImgsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('galeria_imgs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('path_img');
            $table->integer('galeria_id')->unsigned();
            $table->timestamps();
            $table->foreign('galeria_id')->references('id')->on('galerias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('galeria_imgs');
    }
}
