<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosGastosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingresos_gastos', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_tipo_gasto')->unsigned()->index();
			$table->bigInteger('id_tipo_moneda')->unsigned()->index();
			$table->double('monto',12,2)->nullable();
			$table->string('estado_pago');
			$table->date('fecha_vencimiento')->nullable();
			$table->date('fecha_pago')->nullable();
			$table->bigInteger('id_tipo_sustento')->unsigned()->index();
			$table->string('sustento',255)->nullable();
			$table->date('fecha_sustento')->nullable();
			$table->string('url_sustento',100)->nullable();
			$table->bigInteger('id_proyecto')->unsigned()->index();
			$table->bigInteger('id_expediente')->unsigned()->index();
			$table->bigInteger('id_dist_judicial')->unsigned()->index();
			$table->bigInteger('id_org_juris')->unsigned()->index();
			$table->bigInteger('id_exp_digital')->unsigned()->index();
			$table->string('estado','1');
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
        Schema::dropIfExists('ingresos_gastos');
    }
}
