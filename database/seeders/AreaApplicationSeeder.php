<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AreaApplication;

class AreaApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AreaApplication::create(['name' => 'CONTINENTE']);
        AreaApplication::create(['name' => 'GALÁPAGOS']);
    }
}
