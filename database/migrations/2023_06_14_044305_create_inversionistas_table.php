<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInversionistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inversionistas', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_proyecto')->unsigned()->index();
			$table->bigInteger('id_persona')->unsigned()->index();
			$table->bigInteger('id_empresa')->unsigned()->index();
			$table->double('porcentaje',5,2)->nullable();
			$table->string('estado',1)->nullable()->default('1');
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
        Schema::dropIfExists('inversionistas');
    }
}
