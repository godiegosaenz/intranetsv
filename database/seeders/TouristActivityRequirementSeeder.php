<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TouristActivityRequirement;

class TouristActivityRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TouristActivityRequirement::create(['requirement_id' => 1,'tourist_activity_id' => 1]);
    }
}
