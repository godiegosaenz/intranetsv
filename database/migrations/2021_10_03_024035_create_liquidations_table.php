<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLiquidationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('voucher_number')->nullable();
            $table->bigInteger('liquidation_number');
            $table->char('liquidation_code',20);
            $table->decimal('total_payment',$precision = 20, $scale = 2)->nullable();
            $table->boolean('status');
            $table->char('username');
            $table->text('observation')->nullable();
            $table->integer('year');
            $table->unsignedBigInteger('type_liquidation_id');
            $table->index('type_liquidation_id');
            $table->foreign('type_liquidation_id')->references('id')->on('type_liquidations');
            $table->unsignedBigInteger('establishment_id');
            $table->index('establishment_id');
            $table->foreign('establishment_id')->references('id')->on('establishments');
            $table->boolean('is_coercive');
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
        Schema::dropIfExists('liquidations');
    }
}
