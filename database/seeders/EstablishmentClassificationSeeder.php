<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\EstablishmentClassification;

class EstablishmentClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EstablishmentClassification::create(['name' => 'Hotel', 'nomenclature' => 'H','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Hostal', 'nomenclature' => 'HS','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Hosteria', 'nomenclature' => 'HT','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Hacienda Turistica', 'nomenclature' => 'HA','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Lodge', 'nomenclature' => 'L','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Resort', 'nomenclature' => 'RS','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Refugio', 'nomenclature' => 'RF','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Campamento Turistico', 'nomenclature' => 'CT','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Casa de Huespedes', 'nomenclature' => 'CH','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['name' => 'Cafetería', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Bar', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Restaurante', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Discoteca', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Establecimiento Móvil', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Plazas de Comida', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Servicios de Catering', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['name' => 'Agencia de viajes', 'nomenclature' => null,'tourist_activity_id' => 3]);
    }
}
