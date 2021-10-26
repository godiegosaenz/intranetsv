<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleEntitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_entities', function (Blueprint $table) {
            $table->id();
            $table->char('cc_ruc',13)->unique();
            $table->char('type_document',1);
            $table->char('name', 150);
            $table->char('last_name', 150);
            $table->char('maternal_last_name', 150)->nullable();
            $table->boolean('is_person');
            $table->date('date_birth');
            $table->char('status',1);
            $table->string('address', 191);
            $table->integer('legal_representative')->nullable();
            $table->char('tradename', 150)->nullable();
            $table->char('bussines_name', 150)->nullable();
            $table->char('type', 150)->nullable();
            $table->char('number_phone1',10);
            $table->char('number_phone2',10)->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('country_id');
            $table->unsignedBigInteger('province_id');
            $table->unsignedBigInteger('canton_id');
            $table->unsignedBigInteger('parish_id');
            $table->timestamps();
            $table->index(['country_id','province_id','canton_id','parish_id']);
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('canton_id')->references('id')->on('cantons');
            $table->foreign('parish_id')->references('id')->on('parishes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people_entities');
    }
}
