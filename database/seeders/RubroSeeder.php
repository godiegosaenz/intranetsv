<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Rubro;

class RubroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rubro::create([
            'name' => 'LICENCIA UNICA ANUAL DE FUNCIONAMIENTO',
            'status' => true,
            'value' => 0.00,
            'accounting_account' => '',
        ]);
        Rubro::create([
            'name' => 'TASA ADMINISTRATIVA',
            'status' => true,
            'value' => 5.00,
            'accounting_account' => '',
        ]);
    }
}
