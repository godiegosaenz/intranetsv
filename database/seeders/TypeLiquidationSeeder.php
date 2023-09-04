<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeLiquidation;

class TypeLiquidationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeLiquidation::create(['name' => 'LICENCIA UNICA ANUAL DE FUNCIONAMIENTO',
                                'status' => TRUE]);
    }
}
