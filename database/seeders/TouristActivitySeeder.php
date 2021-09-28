<?php

namespace Database\Seeders;

use App\Models\touristActivity;
use Illuminate\Database\Seeder;

class TouristActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        touristActivity::create(['name' => 'Alojamieno Turístico']);
        touristActivity::create(['name' => 'Alimentos y bebidas']);
        touristActivity::create(['name' => 'Operación e Intermediación']);
    }
}
