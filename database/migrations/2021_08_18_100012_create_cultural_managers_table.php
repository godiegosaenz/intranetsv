<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCulturalManagersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cultural_managers', function (Blueprint $table) {
            $table->id();
            $table->char('name', 150);
            $table->boolean('status');
            $table->unsignedBigInteger('type_activities_id');
            $table->unsignedBigInteger('scope_activities_id');
            $table->unsignedBigInteger('people_entities_id');
            $table->timestamps();
            $table->index('type_activities_id','type_cultural_manager_id_index');
            $table->index('scope_activities_id','scope_cultural_manager_id_index');
            $table->index('people_entities_id','people_entities_id_index');
            $table->foreign('type_activities_id')->references('id')->on('type_activities');
            $table->foreign('scope_activities_id')->references('id')->on('scope_activities');
            $table->foreign('people_entities_id')->references('id')->on('people_entities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cultural_managers');
    }
}
