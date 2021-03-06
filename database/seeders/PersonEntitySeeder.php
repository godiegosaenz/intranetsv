<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PersonEntity;

class PersonEntitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonEntity::create([
            'cc_ruc' => '1314801349',
            'type_document' => '1',
            'name' => 'Diego Andres',
            'last_name' => 'Bermudez',
            'maternal_last_name' => 'Saenz',
            'is_person' => true,
            'is_required_accounts' => false,
            'has_disability' => false,
            'old_age' => false,
            'date_birth' => '1992-03-16',
            'status' => '1',
            //'address' => 'San Vicente - El progreso',
            //'legal_representative' => null,
            'tradename' => null,
            'bussines_name' => null,
            'type' => '1',
            'number_phone1' => '0939120904',
            'number_phone2' => null,
            'email' => 'dbermudez1349@hotmail.com',
            //'country_id' => 1,
            //'province_id' => 13,
            //'canton_id' => 109,
            //'parish_id' => 308,
        ]);

        PersonEntity::create([
            'cc_ruc' => '1314801465',
            'type_document' => '1',
            'name' => 'Juan',
            'last_name' => 'Parraga',
            'maternal_last_name' => 'Saenz',
            'is_person' => true,
            'is_required_accounts' => false,
            'has_disability' => false,
            'old_age' => false,
            'date_birth' => '2000-08-07',
            'status' => '1',
            //'address' => 'Leonidas Plaza',
            'tradename' => null,
            'bussines_name' => null,
            'type' => '1',
            'number_phone1' => '0939120904',
            'number_phone2' => null,
            'email' => 'juanjesusparraga@hotmail.com',
        ]);

        PersonEntity::create([
            'cc_ruc' => '1314676725001',
            'type_document' => '2',
            'name' => null,
            'last_name' => null,
            'maternal_last_name' => null,
            'is_person' => true,
            'is_required_accounts' => false,
            'has_disability' => false,
            'old_age' => false,
            'date_birth' => '1997-05-27',
            'status' => '1',
            //'address' => 'San Vicente - El progreso',

            'tradename' => 'Gaby Loor ',
            'bussines_name' => 'GABY LOOR S.A.',
            'type' => '2',
            'number_phone1' => '0939120945',
            'number_phone2' => null,
            'email' => 'gabyloorcano@gmail.com',
        ]);
    }
}
