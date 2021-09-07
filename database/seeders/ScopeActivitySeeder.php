<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ScopeActivity;

class ScopeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScopeActivity::create(['name' => 'USOS SOCIALES, RITUALES Y ACTOS FESTIVOS', 'status' => true, 'type_activities_id' => 1]);
        ScopeActivity::create(['name' => 'ARTES DEL ESPECTACULOS', 'status' => true, 'type_activities_id' => 2]);
    }
}
