<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travels', function (Blueprint $table) {
            $table->id();

            $table->boolean('has_sewer');
            $table->boolean('has_sewage_treatment_system');
            $table->boolean('has_septic_tank');
            $table->boolean('is_patrimonial');
            $table->unsignedBigInteger('accommodation_category_id');
            $table->unsignedBigInteger('accommodation_classification_id');
            $table->unsignedBigInteger('tourist_activity_id');
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
        Schema::dropIfExists('travels');
    }
}
