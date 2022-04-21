<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country', function (Blueprint $table) {

            $table->bigInteger('idmunicipio')->unique()->primary()->index();
            $table->string('name');

            // Relationship with department
            $table->bigInteger('kaNiDepartmentFK')->index();
            $table->foreign('kaNiDepartmentFK')->references('kaNiDepartment')->on('department');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('country');
    }
}
