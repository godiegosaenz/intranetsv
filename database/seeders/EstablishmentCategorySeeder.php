<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\EstablishmentCategory;

class EstablishmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Categoria alojamiento
        EstablishmentCategory::create(['id' => 1, 'name' => 'Sin categoria']);

        EstablishmentCategory::create(['id' => 2, 'name' => 'Unica']);
        EstablishmentCategory::create(['id' => 3, 'name' => '1 estrella']);
        EstablishmentCategory::create(['id' => 4, 'name' => '2 estrellas']);
        EstablishmentCategory::create(['id' => 5, 'name' => '3 estrellas']);
        EstablishmentCategory::create(['id' => 6, 'name' => '4 estrellas']);
        EstablishmentCategory::create(['id' => 7, 'name' => '5 estrellas']);

        //Categoria alimentos y bebidas
        EstablishmentCategory::create(['id' => 8, 'name' => '1 tenedor']);
        EstablishmentCategory::create(['id' => 9, 'name' => '2 tenedores']);
        EstablishmentCategory::create(['id' => 10, 'name' => '3 tenedores']);
        EstablishmentCategory::create(['id' => 11, 'name' => '4 tenedores']);
        EstablishmentCategory::create(['id' => 12, 'name' => '5 tenedores']);
        EstablishmentCategory::create(['id' => 13, 'name' => '1 taza']);
        EstablishmentCategory::create(['id' => 14, 'name' => '2 tazas']);
        EstablishmentCategory::create(['id' => 15, 'name' => '1 copa']);
        EstablishmentCategory::create(['id' => 16, 'name' => '2 copas']);
        EstablishmentCategory::create(['id' => 17, 'name' => '3 copas']);

        //Categoria de transporters
        EstablishmentCategory::create(['id' => 18, 'name' => 'Micro empresa']);
        EstablishmentCategory::create(['id' => 19, 'name' => 'Pequeña empresa']);
        EstablishmentCategory::create(['id' => 20, 'name' => 'Mediana empresa']);
        EstablishmentCategory::create(['id' => 21, 'name' => 'Grande empresa']);

    }
}
