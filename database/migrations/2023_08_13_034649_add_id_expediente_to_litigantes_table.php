<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdExpedienteToLitigantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('litigantes', function (Blueprint $table) {
            $table->bigInteger('id_expediente')->unsigned()->index()->nullable();
			$table->string('estado_lit',1)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('litigantes', function (Blueprint $table) {
            //
        });
    }
}
