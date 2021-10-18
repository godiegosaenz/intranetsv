<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassificationCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classification_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classification_id');
            $table->index('classification_id');
            $table->foreign('classification_id')->references('id')->on('establishments_classifications');
            $table->unsignedBigInteger('category_id');
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('establishments_categories');
            $table->float('canton_1', 8, 2);
            $table->float('canton_2', 8, 2);
            $table->float('canton_3', 8, 2);
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
        Schema::dropIfExists('classification_categories');
    }
}
