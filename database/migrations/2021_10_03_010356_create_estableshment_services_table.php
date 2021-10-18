<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstableshmentServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estableshment_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->index('service_id');
            $table->foreign('service_id')->references('id')->on('services');
            $table->unsignedBigInteger('estableshment_id');
            $table->index('estableshment_id');
            $table->foreign('estableshment_id')->references('id')->on('estableshments');
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
        Schema::dropIfExists('estableshment_services');
    }
}
