<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_tipo_documento')->unsigned()->index();
			$table->string('documento',15)->nullable();
			$table->string('a_paterno',40)->nullable();
			$table->string('a_materno',40)->nullable();
			$table->string('nombres',40)->nullable();
			$table->string('estado',1)->nullable()->default('1');
			$table->bigInteger('id_usuario_inserta')->unsigned()->index();
			$table->bigInteger('id_usuario_actualiza')->unsigned()->index();
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
        Schema::dropIfExists('personas');
    }
}
