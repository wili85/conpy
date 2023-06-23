<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeDepartamentoToUbigeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ubigeos', function (Blueprint $table) {
            DB::statement("Alter table ubigeos alter column departamento type character varying(80)");
			DB::statement("Alter table ubigeos alter column provincia type character varying(80)");
			DB::statement("Alter table ubigeos alter column distrito type character varying(80)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ubigeos', function (Blueprint $table) {
            //
        });
    }
}
