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
            $table->boolean('is_register_mintel')->default(false); //campo nuevo
            $table->char('establishment_type')->default(1); // ninguno 1, franquicia 2 , cadena/sucursal 3
            $table->char('franchise_chain')->nullable(); // si se selecciona franquicia o cadena
            $table->char('local')->default(1); // propio 1, arrendado 2, cedido
            $table->char('status')->default(1);
            $table->string('web_page')->nullable();
            $table->string('email')->unique()->nullable();
            $table->char('phone')->nullable();
            $table->text('observation')->nullable();
            $table->text('main_street')->nullable();
            $table->text('secondary_street')->nullable();
            $table->text('location_reference')->nullable();
            $table->char('number_establishment')->nullable();
            $table->text('address')->nullable();
            $table->float('lat', 10, 8)->nullable();
            $table->float('lng', 10, 8)->nullable();
            $table->char('register')->default('0');
            $table->boolean('has_requeriment')->default(false);
            $table->boolean('has_sewer')->default(false);
            $table->boolean('has_sewage_treatment_system')->default(false);
            $table->boolean('has_septic_tank')->default(false);
            $table->boolean('is_patrimonial')->default(false);
            $table->unsignedBigInteger('country_id')->nullable();;
            $table->unsignedBigInteger('province_id')->nullable();;
            $table->unsignedBigInteger('canton_id')->nullable();;
            $table->unsignedBigInteger('parish_id')->nullable();;
            $table->foreign('country_id')->references('id')->on('countries');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('canton_id')->references('id')->on('cantons');
            $table->foreign('parish_id')->references('id')->on('parishes');
            $table->unsignedBigInteger('owner_id')->nullable();
            //propietario
            $table->index('owner_id');
            $table->foreign('owner_id')->references('id')->on('people_entities');
            //Representante legal
            $table->unsignedBigInteger('legal_representative_id')->nullable();
            $table->index('legal_representative_id');
            $table->foreign('legal_representative_id')->references('id')->on('people_entities');
            $table->unsignedBigInteger('tourist_activity_id')->nullable();
            $table->index('tourist_activity_id');
            $table->foreign('tourist_activity_id')->references('id')->on('tourist_activities');
            $table->unsignedBigInteger('classification_id')->nullable();
            $table->index('classification_id');
            $table->foreign('classification_id')->references('id')->on('establishments_classifications');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->index('category_id');
            $table->foreign('category_id')->references('id')->on('establishments_categories');
            $table->unsignedBigInteger('establishment_id'); // selecciona el ruc del establecimiento
            $table->foreign('establishment_id')->references('id')->on('people_entities');
            $table->char('username');
            $table->integer('total_rooms')->nullable();
            $table->integer('total_beds')->nullable();
            $table->integer('total_places')->nullable();
            $table->boolean('complementary_services')->default(false);
            $table->integer('total_number_employees')->default(0); // numero total de empleados
            $table->integer('total_number_male_employees')->default(0); // numero total de empleados hombres
            $table->integer('total_number_female_employees')->default(0); // numero total de empleados mujeres
            $table->integer('total_number_male_manager')->default(0); // numero total de gerentes hombres
            $table->integer('total_number_female_manager')->default(0); // numero total de gerentes mujeres
            $table->integer('total_number_administrative_men')->default(0); // numero total de administrativos hombres
            $table->integer('total_number_administrative_woman')->default(0); // numero total de administrativos mujeres
            $table->integer('total_number_male_receptionists')->default(0); // numero total de recepcionistas hombres
            $table->integer('total_number_female_receptionists')->default(0); // numero total de recepcionistas mujeres
            $table->integer('total_number_male_rooms')->default(0); // numero total de hombres trabajando en habitaciones
            $table->integer('total_number_female_rooms')->default(0); // numero total de hombres trabajando en habitaciones
            $table->integer('total_number_male_restaurant')->default(0); // numero total de hombres trabajando en restaurant
            $table->integer('total_number_female_restaurant')->default(0); // numero total de mujeres trabajando en restaurant
            $table->integer('total_number_male_bars')->default(0); // numero total de hombres trabajando en bar
            $table->integer('total_number_female_bars')->default(0); // numero total de mujeres trabajando en bar
            $table->integer('total_number_male_cook')->default(0); // numero total de hombres trabajando en la cocina
            $table->integer('total_number_female_cook')->default(0); // numero total de mujeres trabajando en la cocina
            $table->integer('total_number_male_concierge')->default(0); // numero total de hombres trabajando de conserje
            $table->integer('total_number_female_concierge')->default(0); // numero total de mujeres trabajando de conserje
            $table->integer('total_number_male_other')->default(0); // numero total de hombres trabajando en otros
            $table->integer('total_number_female_other')->default(0); // numero total de mujeres trabajando en otros
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
