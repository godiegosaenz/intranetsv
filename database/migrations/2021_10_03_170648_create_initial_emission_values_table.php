<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInitialEmissionValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('initial_emission_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rubro_id');
            $table->index('rubro_id');
            $table->foreign('rubro_id')->references('id')->on('rubros');
            $table->integer('year');
            $table->float('initial_value');
            $table->boolean('status');
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
        Schema::dropIfExists('initial_emission_values');
    }
}
