<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTouristActivityRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tourist_activity_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirement_id');
            $table->index('requirement_id');
            $table->foreign('requirement_id')->references('id')->on('requirements');
            $table->unsignedBigInteger('tourist_activity_id');
            $table->index('tourist_activity_id');
            $table->foreign('tourist_activity_id')->references('id')->on('tourist_activities');
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
        Schema::dropIfExists('tourist_activity_requirements');
    }
}
