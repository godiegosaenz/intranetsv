<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('requirement_id');
            $table->index('requirement_id');
            $table->foreign('requirement_id')->references('id')->on('requirements');
            $table->unsignedBigInteger('establishment_id');
            $table->index('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->boolean('upload')->nullable();
            $table->string('name')->nullable();
            $table->string('file_path')->nullable();
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
        Schema::dropIfExists('establishment_requirements');
    }
}
