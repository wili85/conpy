<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyectoImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_imagenes', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_proyecto')->unsigned()->index();
			$table->string('ruta',300)->nullable();
			$table->string('estado',1)->nullable()->default('1');
			$table->bigInteger('id_usuario_created')->unsigned()->index();
			$table->bigInteger('id_usuario_updated')->unsigned()->index();
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
        Schema::dropIfExists('proyecto_imagenes');
    }
}
