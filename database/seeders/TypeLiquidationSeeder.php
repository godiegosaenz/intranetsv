<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\TypeLiquidation;

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
