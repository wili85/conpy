<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mov_expedientes', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_expediente')->unsigned()->index();
			$table->bigInteger('id_dist_judicial')->unsigned()->index();
			$table->bigInteger('id_org_juris')->unsigned()->index();
			$table->bigInteger('id_exp_digital')->unsigned()->index();
			$table->bigInteger('id_empleado')->unsigned()->index();
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
        Schema::dropIfExists('mov_expedientes');
    }
}
