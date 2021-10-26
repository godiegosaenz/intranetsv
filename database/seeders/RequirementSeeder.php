<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Requirement;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Requirement::create(['name' => 'Registro Unico Contribuyente','Description' => 'para persona natural o jurídica','type_document' => 'pdf']);
        Requirement::create(['name' => ' Inventario valorado de activos fijos de la empresa','Description' => 'bajo la responsabilidad del propietario o representante lega','type_document' => 'pdf']);
        Requirement::create(['name' => 'Pago del uno por mil','Description' => 'sobre el valor de los activos fijos','type_document' => 'pdf']);
    }
}
