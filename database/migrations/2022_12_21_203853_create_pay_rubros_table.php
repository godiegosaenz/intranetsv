<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayRubrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_rubros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('rubro_id');
            $table->index('rubro_id');
            $table->foreign('rubro_id')->references('id')->on('rubros');
            $table->unsignedBigInteger('pay_id');
            $table->index('pay_id');
            $table->foreign('pay_id')->references('id')->on('pays');
            $table->decimal('value', $precision = 12, $scale = 2);
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
        Schema::dropIfExists('pay_rubros');
    }
}
