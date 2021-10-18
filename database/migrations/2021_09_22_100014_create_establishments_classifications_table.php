<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsClassificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments_classifications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->char('nomenclature')->nullable();
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
        Schema::dropIfExists('establishments_classifications');
    }
}
