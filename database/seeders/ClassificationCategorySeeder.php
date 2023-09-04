<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClassificationCategory;

class ClassificationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //hotel
        ClassificationCategory::create(
            [
                'classification_id' => 1,
                'category_id' => 4,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 1,
                'category_id' => 5,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 1,
                'category_id' => 6,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 1,
                'category_id' => 7,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Hostal
        ClassificationCategory::create(
            [
                'classification_id' => 2,
                'category_id' => 3,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 2,
                'category_id' => 4,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 2,
                'category_id' => 5,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //hosteria
        ClassificationCategory::create(
            [
                'classification_id' => 3,
                'category_id' => 5,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 3,
                'category_id' => 6,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 3,
                'category_id' => 7,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //hacienda turistica
        ClassificationCategory::create(
            [
                'classification_id' => 4,
                'category_id' => 5,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 4,
                'category_id' => 6,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 4,
                'category_id' => 7,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //Lodg5
         ClassificationCategory::create(
            [
                'classification_id' => 5,
                'category_id' => 5,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 5,
                'category_id' => 6,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 5,
                'category_id' => 7,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //Resort
         ClassificationCategory::create(
            [
                'classification_id' => 6,
                'category_id' => 6,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 6,
                'category_id' => 7,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Refugio
        ClassificationCategory::create(
            [
                'classification_id' => 7,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Campamento turistico
        ClassificationCategory::create(
            [
                'classification_id' => 8,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Casa de huespedes
        ClassificationCategory::create(
            [
                'classification_id' => 9,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //cafeteria
        ClassificationCategory::create(
            [
                'classification_id' => 10,
                'category_id' => 13,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 10,
                'category_id' => 14,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Restaurantes
        ClassificationCategory::create(
            [
                'classification_id' => 12,
                'category_id' => 8,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 12,
                'category_id' => 9,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 12,
                'category_id' => 10,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 12,
                'category_id' => 11,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 12,
                'category_id' => 12,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Bares
        ClassificationCategory::create(
            [
                'classification_id' => 11,
                'category_id' => 15,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 11,
                'category_id' => 16,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 11,
                'category_id' => 17,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //Discotecas
         ClassificationCategory::create(
            [
                'classification_id' => 13,
                'category_id' => 15,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 13,
                'category_id' => 16,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        ClassificationCategory::create(
            [
                'classification_id' => 13,
                'category_id' => 17,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //Establecimientos moviles
         ClassificationCategory::create(
            [
                'classification_id' => 14,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //Plaza de comida
         ClassificationCategory::create(
            [
                'classification_id' => 15,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //Servicio de Catering
         ClassificationCategory::create(
            [
                'classification_id' => 16,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
         //agencias de viajes mayoritaria
         ClassificationCategory::create(
            [
                'classification_id' => 17,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //agencias de viajes internacional
         ClassificationCategory::create(
            [
                'classification_id' => 18,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //agencias de operador turistico
         ClassificationCategory::create(
            [
                'classification_id' => 19,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //agencia de viaje dual
         ClassificationCategory::create(
            [
                'classification_id' => 20,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //centro de convenciones
         ClassificationCategory::create(
            [
                'classification_id' => 21,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //organizadores de eventos
         ClassificationCategory::create(
            [
                'classification_id' => 22,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Sala de recepciones y banquetes
         ClassificationCategory::create(
            [
                'classification_id' => 23,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //Parque de atraccion establecidos
         ClassificationCategory::create(
            [
                'classification_id' => 24,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte de alquiler
         ClassificationCategory::create(
            [
                'classification_id' => 28,
                'category_id' => 18,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte de alquiler
         ClassificationCategory::create(
            [
                'classification_id' => 28,
                'category_id' => 18,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte de alquiler micro empresa
         ClassificationCategory::create(
            [
                'classification_id' => 28,
                'category_id' => 18,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte de alquiler pequeña
         ClassificationCategory::create(
            [
                'classification_id' => 28,
                'category_id' => 19,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte de alquiler mediana
         ClassificationCategory::create(
            [
                'classification_id' => 28,
                'category_id' => 20,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte de alquiler grande
         ClassificationCategory::create(
            [
                'classification_id' => 28,
                'category_id' => 21,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte aereo sin categoria
         ClassificationCategory::create(
            [
                'classification_id' => 25,
                'category_id' => 2,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte maritimo micro
         ClassificationCategory::create(
            [
                'classification_id' => 26,
                'category_id' => 18,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte maritimo pequeño
         ClassificationCategory::create(
            [
                'classification_id' => 26,
                'category_id' => 19,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte maritimo mediano
         ClassificationCategory::create(
            [
                'classification_id' => 26,
                'category_id' => 20,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
        //transporte maritimo grande
         ClassificationCategory::create(
            [
                'classification_id' => 26,
                'category_id' => 21,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );

        //transporte maritimo grande
        ClassificationCategory::create(
            [
                'classification_id' => 29,
                'category_id' => 1,
                'canton_1' => 0,
                'canton_2' => 0,
                'canton_3' => 0,
            ]
        );
    }
}
