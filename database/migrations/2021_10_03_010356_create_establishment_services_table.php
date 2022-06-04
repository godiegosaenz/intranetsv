<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishment_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->index('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->unsignedBigInteger('establishment_id');
            $table->index('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->char('services_type');
            $table->integer('services_total_beds')->default(0);
            $table->integer('services_total_plazas')->default(0);
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
        Schema::dropIfExists('establishment_services');
    }
}
