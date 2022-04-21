<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstablishmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('establishments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('start_date');
            $table->integer('registry_number')->nullable();
            $table->char('cadastral_registry')->nullable();
            $table->boolean('is_register_mintel')->default(false);
            $table->boolean('is_main');
            $table->boolean('is_branch');
            $table->char('organization_type');
            $table->char('local');
            $table->boolean('status')->default(false);
            $table->string('web_page')->nullable();
            $table->string('email');
            $table->char('phone');
            $table->text('observation')->nullable();
            $table->char('register')->default('0');
            $table->boolean('has_requeriment')->default(false);
            $table->boolean('has_sewer');
            $table->boolean('has_sewage_treatment_system');
            $table->boolean('has_septic_tank');
            $table->boolean('is_patrimonial');
            $table->unsignedBigInteger('owner_id')->nullable();
            //propietario
            $table->index('owner_id');
            $table->foreign('owner_id')->references('id')->on('people_entities');
            //Representante legal
            $table->unsignedBigInteger('legal_representative_id')->nullable();
            $table->index('legal_representative_id');
            $table->foreign('legal_representative_id')->references('id')->on('people_entities');
            $table->unsignedBigInteger('tourist_activity_id');
            $table->index('tourist_activity_id');
            $table->foreign('tourist_activity_id')->references('id')->on('tourist_activities');
            $table->unsignedBigInteger('classification_id');
            $table->index('classification_id');
            $table->foreign('classification_id')->references('id')->on('establishments_classifications');
            $table->unsignedBigInteger('category_id');
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('establishments_categories');
            $table->char('username');
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
        Schema::dropIfExists('establishments');
    }
}
