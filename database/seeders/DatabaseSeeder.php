<?php

namespace Database\Seeders;

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
            CountrySeeder::class,
            ProvinceSeeder::class,
            CantonSeeder::class,
            ParishSeeder::class,
            PermissionsSeeder::class,
            RolesSeeder::class,
            PersonEntitySeeder::class,
            UserSeeder::class,
            TypeActivitySeeder::class,
            ScopeActivitySeeder::class,
            TouristActivitySeeder::class,
            EstablishmentClassificationSeeder::class,
            EstablishmentCategorySeeder::class,
            TypeRoomSeeder::class,
            ClassificationCategorySeeder::class,
            RequirementSeeder::class,
            TouristActivityRequirementSeeder::class,
            AreaApplicationSeeder::class,
            ServicesSeeder::class,
            CatalogueSBUSeeder::class,
            TypeLiquidationSeeder::class,
            RubroSeeder::class,
            LuafTableSeeder::class,

        ]);
    }
}
