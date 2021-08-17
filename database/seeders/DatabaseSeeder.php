<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\PersonEntity;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            CountrySeeder::class,
            ProvinceSeeder::class,
            CantonSeeder::class,
            PersonEntitySeeder::class,
            UserSeeder::class,
        ]);
    }
}
