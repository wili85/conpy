<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleInversionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_inversiones', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_inversionista')->unsigned()->index();
			$table->bigInteger('id_tipo_moneda')->unsigned()->index();
			$table->double('monto',12,2)->nullable();
			$table->string('estado',1)->nullable()->default('1');
			$table->bigInteger('id_tipo_sustento')->unsigned()->index();
			$table->string('sustento',255)->nullable();
			$table->string('descripcion',255)->nullable();
			$table->date('fecha_sustento')->nullable();
			$table->string('url_sustento',100)->nullable();
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
        Schema::dropIfExists('detalle_inversiones');
    }
}
