<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Catalogue_SBU;

class CatalogueSBUSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catalogue_SBU::create(['year' => 2022, 'value' => 425.00]);
    }
}
