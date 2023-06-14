<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
			$table->string('numero',12)->nullable();
			$table->string('anio',4)->nullable();
			$table->string('glosa',100)->nullable();
			$table->string('descripcion',300)->nullable();
			$table->string('cod_ubigeo',10)->nullable();
			$table->bigInteger('id_litigante')->unsigned()->index();
			$table->bigInteger('id_dist_judicial')->unsigned()->index();
			$table->bigInteger('id_org_juris')->unsigned()->index();
			$table->bigInteger('id_exp_digital')->unsigned()->index();
			$table->bigInteger('id_materia')->unsigned()->index();
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
        Schema::dropIfExists('expedientes');
    }
}
