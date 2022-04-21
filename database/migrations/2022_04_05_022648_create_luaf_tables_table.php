<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLuafTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('luaf_tables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tourist_activity_id');
            $table->index('tourist_activity_id');
            $table->foreign('tourist_activity_id')->references('id')->on('tourist_activities');
            $table->unsignedBigInteger('classification_id');
            $table->index('classification_id');
            $table->foreign('classification_id')->references('id')->on('establishments_classifications');
            $table->unsignedBigInteger('category_id');
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('establishments_categories');
            $table->float('percentage', 8, 2);
            $table->integer('year');
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('luaf_tables');
    }
}
