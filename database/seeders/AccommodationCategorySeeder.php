<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\AccommodationCategory;

class AccommodationCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccommodationCategory::create(['name' => '1 estrella']);
        AccommodationCategory::create(['name' => '2 estrellas']);
        AccommodationCategory::create(['name' => '3 estrellas']);
        AccommodationCategory::create(['name' => '4 estrellas']);
        AccommodationCategory::create(['name' => '5 estrellas']);
        AccommodationCategory::create(['name' => 'Categoria Unica']);
        AccommodationCategory::create(['name' => 'Pendiente']);
    }
}
