<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\LuafTable;

class LuafTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 4, 'percentage' => 1.44, 'year' =>  2020,  'observacion' => 'Alojamiento-Hotel-2 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 5, 'percentage' => 1.76, 'year' =>  2020,  'observacion' => 'Alojamiento-Hotel-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 6, 'percentage' => 2.33, 'year' =>  2020,  'observacion' => 'Alojamiento-Hotel-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 7, 'percentage' => 3.47, 'year' =>  2020,  'observacion' => 'Alojamiento-Hotel-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 2, 'category_id' => 3, 'percentage' => 0.84, 'year' =>  2020,  'observacion' => 'Alojamiento-Hostal-1 estrella']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 2, 'category_id' => 4, 'percentage' => 0.55, 'year' =>  2020,  'observacion' => 'Alojamiento-Hostal-2 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 2, 'category_id' => 5, 'percentage' => 0.64, 'year' =>  2020,  'observacion' => 'Alojamiento-Hostal-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 3, 'category_id' => 5, 'percentage' => 0.69, 'year' =>  2020,  'observacion' => 'Alojamiento-Hosteria-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 3, 'category_id' => 6, 'percentage' => 0.86, 'year' =>  2020,  'observacion' => 'Alojamiento-Hosteria-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 3, 'category_id' => 7, 'percentage' => 1.2, 'year' =>  2020,  'observacion' => 'Alojamiento-Hosteria-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 4, 'category_id' => 5, 'percentage' => 0.69, 'year' =>  2020,  'observacion' => 'Alojamiento-Hacienda Turistica-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 4, 'category_id' => 6, 'percentage' => 0.86, 'year' =>  2020,  'observacion' => 'Alojamiento-Hacienda Turistica-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 4, 'category_id' => 7, 'percentage' => 1.2, 'year' =>  2020,  'observacion' => 'Alojamiento-Hacienda Turistica-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 5, 'category_id' => 5, 'percentage' => 0.69, 'year' =>  2020,  'observacion' => 'Alojamiento-Lodge-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 5, 'category_id' => 6, 'percentage' => 0.86, 'year' =>  2020,  'observacion' => 'Alojamiento-Lodge-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 5, 'category_id' => 7, 'percentage' => 1.2, 'year' =>  2020,  'observacion' => 'Alojamiento-Lodge-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 6, 'category_id' => 6, 'percentage' => 0.94, 'year' =>  2020,  'observacion' => 'Alojamiento-Resort-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 6, 'category_id' => 7, 'percentage' => 1.28, 'year' =>  2020,  'observacion' => 'Alojamiento-Resort-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 7, 'category_id' => 2, 'percentage' => 0.42, 'year' =>  2020,  'observacion' => 'Alojamiento-Refugio-Unica']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 8, 'category_id' => 2, 'percentage' => 0.42, 'year' =>  2020,  'observacion' => 'Alojamiento-Campamento Turistico-Unica']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 9, 'category_id' => 2, 'percentage' => 0.42, 'year' =>  2020,  'observacion' => 'Alojamiento-Casa de Huespedes-Unica']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 8, 'percentage' => 8.05, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Restaurante-1 tenedor']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 9, 'percentage' => 10.05, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Restaurante-2 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 10, 'percentage' => 15.85, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Restaurante-3 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 11, 'percentage' => 24.6, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Restaurante-4 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 12, 'percentage' => 34.75, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Restaurante-5 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 10, 'category_id' => 13, 'percentage' => 8.45, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Cafetería-1 taza']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 10, 'category_id' => 14, 'percentage' => 13.56, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Cafetería-2 tazas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 11, 'category_id' => 15, 'percentage' => 13.89, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Bar-1 copa']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 11, 'category_id' => 16, 'percentage' => 25.91, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Bar-2 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 11, 'category_id' => 17, 'percentage' => 29.08, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Bar-3 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 13, 'category_id' => 15, 'percentage' => 23.76, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Discoteca-1 copa']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 13, 'category_id' => 16, 'percentage' => 35.51, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Discoteca-2 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 13, 'category_id' => 17, 'percentage' => 36.96, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Discoteca-3 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 14, 'category_id' => 2, 'percentage' => 16.8, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Establecimiento Móvil-Unica']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 15, 'category_id' => 2, 'percentage' => 43.77, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Plazas de Comida-Unica']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 16, 'category_id' => 2, 'percentage' => 46.5, 'year' =>  2020,  'observacion' => 'Alimentos y bebidas-Servicios de Catering-Unica']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 20, 'category_id' => 1, 'percentage' => 46.69, 'year' =>  2020,  'observacion' => 'Agencias de servicios turisticos-Agencia de Viaje Dual-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 18, 'category_id' => 1, 'percentage' => 31.25, 'year' =>  2020,  'observacion' => 'Agencias de servicios turisticos-Agencia de viajes internacional-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 17, 'category_id' => 1, 'percentage' => 56.03, 'year' =>  2020,  'observacion' => 'Agencias de servicios turisticos-Agencia de viajes mayoristas-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 19, 'category_id' => 1, 'percentage' => 18.44, 'year' =>  2020,  'observacion' => 'Agencias de servicios turisticos-Operador Turistico-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 4,'classification_id' => 21, 'category_id' => 1, 'percentage' => 43.22, 'year' =>  2020,  'observacion' => 'Establecimientos de Intermediación-Centro de Convenciones-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 4,'classification_id' => 22, 'category_id' => 1, 'percentage' => 19.21, 'year' =>  2020,  'observacion' => 'Establecimientos de Intermediación-Organizadores de Eventos-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 4,'classification_id' => 23, 'category_id' => 1, 'percentage' => 24.01, 'year' =>  2020,  'observacion' => 'Establecimientos de Intermediación-Sala de recepciones y banquetes-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 5,'classification_id' => 29, 'category_id' => 1, 'percentage' => 0.18, 'year' =>  2020,  'observacion' => 'Centros Turisticos Comunitarios-Centros turisticos comunitarios-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 6,'classification_id' => 24, 'category_id' => 1, 'percentage' => 15.79, 'year' =>  2020,  'observacion' => 'Parques de atraccion estables-Parque de atraccion estables, hipodromos, centros de recreacion turistica, ternas y balnearios-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 7,'classification_id' => 25, 'category_id' => 2, 'percentage' => 28.02, 'year' =>  2020,  'observacion' => 'Transporte Turistico-Transporte Aereo-Unica']);

        //AÑO 2018

        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 4, 'percentage' => 1.44, 'year' =>  2018,  'observacion' => 'Alojamiento-Hotel-2 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 5, 'percentage' => 1.76, 'year' =>  2018,  'observacion' => 'Alojamiento-Hotel-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 6, 'percentage' => 2.33, 'year' =>  2018,  'observacion' => 'Alojamiento-Hotel-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 1, 'category_id' => 7, 'percentage' => 3.47, 'year' =>  2018,  'observacion' => 'Alojamiento-Hotel-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 2, 'category_id' => 3, 'percentage' => 0.84, 'year' =>  2018,  'observacion' => 'Alojamiento-Hostal-1 estrella']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 2, 'category_id' => 4, 'percentage' => 0.55, 'year' =>  2018,  'observacion' => 'Alojamiento-Hostal-2 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 2, 'category_id' => 5, 'percentage' => 0.64, 'year' =>  2018,  'observacion' => 'Alojamiento-Hostal-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 3, 'category_id' => 5, 'percentage' => 0.69, 'year' =>  2018,  'observacion' => 'Alojamiento-Hosteria-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 3, 'category_id' => 6, 'percentage' => 0.86, 'year' =>  2018,  'observacion' => 'Alojamiento-Hosteria-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 3, 'category_id' => 7, 'percentage' => 1.2, 'year' =>  2018,  'observacion' => 'Alojamiento-Hosteria-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 4, 'category_id' => 5, 'percentage' => 0.69, 'year' =>  2018,  'observacion' => 'Alojamiento-Hacienda Turistica-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 4, 'category_id' => 6, 'percentage' => 0.86, 'year' =>  2018,  'observacion' => 'Alojamiento-Hacienda Turistica-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 4, 'category_id' => 7, 'percentage' => 1.2, 'year' =>  2018,  'observacion' => 'Alojamiento-Hacienda Turistica-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 5, 'category_id' => 5, 'percentage' => 0.69, 'year' =>  2018,  'observacion' => 'Alojamiento-Lodge-3 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 5, 'category_id' => 6, 'percentage' => 0.86, 'year' =>  2018,  'observacion' => 'Alojamiento-Lodge-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 5, 'category_id' => 7, 'percentage' => 1.2, 'year' =>  2018,  'observacion' => 'Alojamiento-Lodge-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 6, 'category_id' => 6, 'percentage' => 0.94, 'year' =>  2018,  'observacion' => 'Alojamiento-Resort-4 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 6, 'category_id' => 7, 'percentage' => 1.28, 'year' =>  2018,  'observacion' => 'Alojamiento-Resort-5 estrellas']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 7, 'category_id' => 2, 'percentage' => 0.42, 'year' =>  2018,  'observacion' => 'Alojamiento-Refugio-Unica']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 8, 'category_id' => 2, 'percentage' => 0.42, 'year' =>  2018,  'observacion' => 'Alojamiento-Campamento Turistico-Unica']);
        LuafTable::create(['tourist_activity_id' => 1,'classification_id' => 9, 'category_id' => 2, 'percentage' => 0.42, 'year' =>  2018,  'observacion' => 'Alojamiento-Casa de Huespedes-Unica']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 8, 'percentage' => 8.05, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Restaurante-1 tenedor']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 9, 'percentage' => 10.05, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Restaurante-2 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 10, 'percentage' => 15.85, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Restaurante-3 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 11, 'percentage' => 24.6, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Restaurante-4 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 12, 'category_id' => 12, 'percentage' => 34.75, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Restaurante-5 tenedores']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 10, 'category_id' => 13, 'percentage' => 8.45, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Cafetería-1 taza']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 10, 'category_id' => 14, 'percentage' => 13.56, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Cafetería-2 tazas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 11, 'category_id' => 15, 'percentage' => 13.89, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Bar-1 copa']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 11, 'category_id' => 16, 'percentage' => 25.91, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Bar-2 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 11, 'category_id' => 17, 'percentage' => 29.08, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Bar-3 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 13, 'category_id' => 15, 'percentage' => 23.76, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Discoteca-1 copa']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 13, 'category_id' => 16, 'percentage' => 35.51, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Discoteca-2 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 13, 'category_id' => 17, 'percentage' => 36.96, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Discoteca-3 copas']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 14, 'category_id' => 2, 'percentage' => 16.8, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Establecimiento Móvil-Unica']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 15, 'category_id' => 2, 'percentage' => 43.77, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Plazas de Comida-Unica']);
        LuafTable::create(['tourist_activity_id' => 2,'classification_id' => 16, 'category_id' => 2, 'percentage' => 46.5, 'year' =>  2018,  'observacion' => 'Alimentos y bebidas-Servicios de Catering-Unica']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 20, 'category_id' => 1, 'percentage' => 46.69, 'year' =>  2018,  'observacion' => 'Agencias de servicios turisticos-Agencia de Viaje Dual-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 18, 'category_id' => 1, 'percentage' => 31.25, 'year' =>  2018,  'observacion' => 'Agencias de servicios turisticos-Agencia de viajes internacional-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 17, 'category_id' => 1, 'percentage' => 56.03, 'year' =>  2018,  'observacion' => 'Agencias de servicios turisticos-Agencia de viajes mayoristas-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 3,'classification_id' => 19, 'category_id' => 1, 'percentage' => 18.44, 'year' =>  2018,  'observacion' => 'Agencias de servicios turisticos-Operador Turistico-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 4,'classification_id' => 21, 'category_id' => 1, 'percentage' => 43.22, 'year' =>  2018,  'observacion' => 'Establecimientos de Intermediación-Centro de Convenciones-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 4,'classification_id' => 22, 'category_id' => 1, 'percentage' => 19.21, 'year' =>  2018,  'observacion' => 'Establecimientos de Intermediación-Organizadores de Eventos-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 4,'classification_id' => 23, 'category_id' => 1, 'percentage' => 24.01, 'year' =>  2018,  'observacion' => 'Establecimientos de Intermediación-Sala de recepciones y banquetes-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 5,'classification_id' => 29, 'category_id' => 1, 'percentage' => 0.18, 'year' =>  2018,  'observacion' => 'Centros Turisticos Comunitarios-Centros turisticos comunitarios-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 6,'classification_id' => 24, 'category_id' => 1, 'percentage' => 15.79, 'year' =>  2018,  'observacion' => 'Parques de atraccion estables-Parque de atraccion estables, hipodromos, centros de recreacion turistica, ternas y balnearios-Sin categoria']);
        LuafTable::create(['tourist_activity_id' => 7,'classification_id' => 25, 'category_id' => 2, 'percentage' => 28.02, 'year' =>  2018,  'observacion' => 'Transporte Turistico-Transporte Aereo-Unica']);

    }
}
