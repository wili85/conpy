<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdReniecoToUbigeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ubigeos', function (Blueprint $table) {
            $table->string('id_reniec',7)->nullable();
			$table->string('id_inei',6)->nullable();
			$table->string('id_pais',3)->nullable();
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
