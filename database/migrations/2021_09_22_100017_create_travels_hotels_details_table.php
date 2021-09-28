<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsHotelsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels_hotels_details', function (Blueprint $table) {
            $table->id();
            $table->integer('cbp');
            $table->integer('bc');
            $table->integer('total');
            $table->integer('bed');
            $table->integer('plazas');
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
        Schema::dropIfExists('travels_hotels_details');
    }
}
