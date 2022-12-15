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
            $table->char('name', 150)->nullable();
            $table->char('last_name', 150)->nullable();
            //$table->char('maternal_last_name', 150)->nullable();
            $table->boolean('is_person')->default(true);
            $table->boolean('is_required_accounts')->default(false);
            $table->boolean('has_disability')->default(false);
            $table->boolean('old_age')->default(false);
            $table->date('date_birth');
            $table->char('status',1);
            $table->text('address')->nullable();
            //$table->integer('legal_representative')->nullable();
            $table->char('tradename', 150)->nullable();
            $table->char('bussines_name', 150)->nullable();
            $table->char('type', 150)->nullable();
            $table->char('number_phone1',10);
            $table->char('number_phone2',10)->nullable();
            $table->string('email')->nullable();
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
