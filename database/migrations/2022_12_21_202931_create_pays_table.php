<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('payment_day');
            $table->boolean('status');
            $table->char('user',100);
            $table->decimal('value', $precision = 12, $scale = 2);
            $table->decimal('discount', $precision = 8, $scale = 2);
            $table->decimal('surcharge', $precision = 8, $scale = 2);
            $table->decimal('interest', $precision = 8, $scale = 2);
            $table->text('observation')->nullable();
            $table->string('name_person')->nullable();
            $table->bigInteger('voucher_number')->nullable();
            $table->unsignedBigInteger('personentity_id');
            $table->index('personentity_id');
            $table->foreign('personentity_id')->references('id')->on('people_entities');
            $table->unsignedBigInteger('liquidation_id');
            $table->index('liquidation_id');
            $table->foreign('liquidation_id')->references('id')->on('liquidations');
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
        Schema::dropIfExists('pays');
    }
}
