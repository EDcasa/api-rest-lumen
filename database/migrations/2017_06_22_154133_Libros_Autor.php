<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LibrosAutor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('librosAutor', function(Blueprint $table){
            $table->increments('id_libroAutor');
            $table->integer('id_libros')->unsigned();
            $table->foreign('id_libros')->references('id')->on('libros');
            $table->integer('id_autores')->unsigned();
            $table->foreign('id_autores')->references('id')->on('autores');
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
        //
    }
}
