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
        //Clasificacion de Alojamiento
        EstablishmentClassification::create(['id' => 1, 'name' => 'Hotel', 'nomenclature' => 'H','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 2, 'name' => 'Hostal', 'nomenclature' => 'HS','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 3, 'name' => 'Hosteria', 'nomenclature' => 'HT','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 4, 'name' => 'Hacienda Turistica', 'nomenclature' => 'HA','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 5, 'name' => 'Lodge', 'nomenclature' => 'L','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 6, 'name' => 'Resort', 'nomenclature' => 'RS','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 7, 'name' => 'Refugio', 'nomenclature' => 'RF','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 8, 'name' => 'Campamento Turistico', 'nomenclature' => 'CT','tourist_activity_id' => 1]);
        EstablishmentClassification::create(['id' => 9, 'name' => 'Casa de Huespedes', 'nomenclature' => 'CH','tourist_activity_id' => 1]);

        // Clasificacion de alimentos y bebidas
        EstablishmentClassification::create(['id' => 10, 'name' => 'Cafetería', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['id' => 11, 'name' => 'Bar', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['id' => 12, 'name' => 'Restaurante', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['id' => 13, 'name' => 'Discoteca', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['id' => 14, 'name' => 'Establecimiento Móvil', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['id' => 15, 'name' => 'Plazas de Comida', 'nomenclature' => null,'tourist_activity_id' => 2]);
        EstablishmentClassification::create(['id' => 16, 'name' => 'Servicios de Catering', 'nomenclature' => null,'tourist_activity_id' => 2]);

        //clasificacion de Agencias de servicios turisticos con base en el acuerdo Ministerial 2021-037 Reglamento de Operacion e Intermendiacion Turistica
        EstablishmentClassification::create(['id' => 17, 'name' => 'Agencia de viajes mayoristas', 'nomenclature' => null,'tourist_activity_id' => 3]);
        EstablishmentClassification::create(['id' => 18, 'name' => 'Agencia de viajes internacional', 'nomenclature' => null,'tourist_activity_id' => 3]);
        EstablishmentClassification::create(['id' => 19, 'name' => 'Operador Turistico', 'nomenclature' => null,'tourist_activity_id' => 3]);
        EstablishmentClassification::create(['id' => 20, 'name' => 'Agencia de Viaje Dual', 'nomenclature' => null,'tourist_activity_id' => 3]);

        //clasificacion de Establecimientos de Intermediación con base en el acuerdo Ministerial 2021-037 Reglamento de Operacion e Intermendiacion Turistica

        EstablishmentClassification::create(['id' => 21, 'name' => 'Centro de Convenciones', 'nomenclature' => null,'tourist_activity_id' => 4]);
        EstablishmentClassification::create(['id' => 22, 'name' => 'Organizadores de Eventos', 'nomenclature' => null,'tourist_activity_id' => 4]);
        EstablishmentClassification::create(['id' => 23, 'name' => 'Sala de recepciones y banquetes', 'nomenclature' => null,'tourist_activity_id' => 4]);

         //clasificacion de Parque y atracciones
         EstablishmentClassification::create(['id' => 24, 'name' => 'Parque de atraccion estables, hipodromos, centros de recreacion turistica, ternas y balnearios', 'nomenclature' => null,'tourist_activity_id' => 6]);

         //clasificacion de Transporte turistico con base en el

        EstablishmentClassification::create(['id' => 25, 'name' => 'Transporte Aereo', 'nomenclature' => null,'tourist_activity_id' => 7]);
        EstablishmentClassification::create(['id' => 26, 'name' => 'Transporte Maritimo y Fluvial', 'nomenclature' => null,'tourist_activity_id' => 7]);
        EstablishmentClassification::create(['id' => 27, 'name' => 'Transporte Terrestre', 'nomenclature' => null,'tourist_activity_id' => 7]);
        EstablishmentClassification::create(['id' => 28, 'name' => 'Transporte de Alquiler', 'nomenclature' => null,'tourist_activity_id' => 7]);

         //clasificacion de Centros turisticos comunitarios
         EstablishmentClassification::create(['id' => 29, 'name' => 'Centros turisticos comunitarios', 'nomenclature' => null,'tourist_activity_id' => 5]);
    }
}
