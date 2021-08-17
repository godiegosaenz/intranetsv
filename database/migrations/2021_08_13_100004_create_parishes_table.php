<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParishesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parishes', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->char('code',4)->nullable();
            $table->unsignedBigInteger('canton_id');
            $table->timestamps();
            $table->index('canton_id','parishes_canton_id_index');
            $table->foreign('canton_id')
                ->references('id')
                ->on('cantons')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parishes');
    }
}
