<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScopeActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scope_activities', function (Blueprint $table) {
            $table->id();
            $table->char('name', 150);
            $table->boolean('status');
            $table->unsignedBigInteger('type_activities_id');
            $table->timestamps();
            $table->index('type_activities_id','scope_type_activities_id_index');
            $table->foreign('type_activities_id')->references('id')->on('type_activities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scope_activities');
    }
}
