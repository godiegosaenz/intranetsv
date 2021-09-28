<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\AccommodationClassification;

class AccommodationClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccommodationClassification::create(['name' => 'Hotel', 'nomenclature' => 'H','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Hostal', 'nomenclature' => 'HS','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Hosteria', 'nomenclature' => 'HT','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Hacienda Turistica', 'nomenclature' => 'HA','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Lodge', 'nomenclature' => 'L','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Resort', 'nomenclature' => 'RS','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Refugio', 'nomenclature' => 'RF','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Campamento Turistico', 'nomenclature' => 'CT','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Casa de Huespedes', 'nomenclature' => 'CH','tourist_activity_id' => 1]);
        AccommodationClassification::create(['name' => 'Cafetería', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Bar', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Restaurante', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Discoteca', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Establecimiento Móvil', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Plazas de Comida', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Servicios de Caterin2', 'nomenclature' => null,'tourist_activity_id' => 2]);
        AccommodationClassification::create(['name' => 'Agencia de viajes Mayorista', 'nomenclature' => null,'tourist_activity_id' => 3]);
        AccommodationClassification::create(['name' => 'Agencia de viajes Internacional', 'nomenclature' => null,'tourist_activity_id' => 3]);
        AccommodationClassification::create(['name' => 'Operador Turístico', 'nomenclature' => null,'tourist_activity_id' => 3]);
        AccommodationClassification::create(['name' => 'Agencias de viajes dual', 'nomenclature' => null,'tourist_activity_id' => 3]);
    }
}
