<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpeDigitalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expe_digitales', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_tipo_documento_administrativo')->unsigned()->index();
			$table->string('detalle_documento',200)->nullable();
			$table->date('fecha_documento')->nullable();
			$table->string('url_expe_digital',100)->nullable();
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
        Schema::dropIfExists('expe_digitales');
    }
}
