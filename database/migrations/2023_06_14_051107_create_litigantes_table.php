<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLitigantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('litigantes', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('id_tipo_litigante')->unsigned()->index();
			$table->bigInteger('id_persona')->unsigned()->index();
			$table->bigInteger('id_empresa')->unsigned()->index();
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
        Schema::dropIfExists('litigantes');
    }
}
