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
        EstablishmentCategory::create(['name' => '1 estrella']);
        EstablishmentCategory::create(['name' => '2 estrellas']);
        EstablishmentCategory::create(['name' => '3 estrellas']);
        EstablishmentCategory::create(['name' => '4 estrellas']);
        EstablishmentCategory::create(['name' => '5 estrellas']);
        EstablishmentCategory::create(['name' => 'Unica']);
        EstablishmentCategory::create(['name' => 'Pendiente']);
        EstablishmentCategory::create(['name' => '1 tenedor']);
        EstablishmentCategory::create(['name' => '2 tenedores']);
        EstablishmentCategory::create(['name' => '3 tenedores']);
        EstablishmentCategory::create(['name' => '4 tenedores']);
        EstablishmentCategory::create(['name' => '5 tenedores']);
        EstablishmentCategory::create(['name' => '1 taza']);
        EstablishmentCategory::create(['name' => '2 tazas']);
        EstablishmentCategory::create(['name' => '1 copa']);
        EstablishmentCategory::create(['name' => '2 copas']);
        EstablishmentCategory::create(['name' => '3 copas']);
    }
}
