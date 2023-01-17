<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario_comunis', function (Blueprint $table) {
            
            $table->integer('ID_usuario')->references('id')->on('usuarios');
            $table->integer('ID_com')->references('id')->on('comunidads');
            $table->string('estado');
            $table->primary(['ID_usuario','ID_com']);
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
        Schema::dropIfExists('usuario_comunis');
    }
};
