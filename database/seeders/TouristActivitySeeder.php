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
        touristActivity::create(['id' => 1, 'name' => 'Alojamiento']);
        touristActivity::create(['id' => 2, 'name' => 'Alimentos y bebidas']);
        touristActivity::create(['id' => 3, 'name' => 'Agencias de servicios turisticos']);
        touristActivity::create(['id' => 4, 'name' => 'Establecimientos de Intermediación']);
        touristActivity::create(['id' => 5, 'name' => 'Centros Turisticos Comunitarios']);
        touristActivity::create(['id' => 6, 'name' => 'Parques de atraccion estables']);
        touristActivity::create(['id' => 7, 'name' => 'Transporte Turistico']);
    }
}
