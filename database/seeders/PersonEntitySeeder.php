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
            'name' => 'DIEGO ANDRES',
            'last_name' => 'BERMUDEZ SAENZ',
            'is_person' => true,
            'is_required_accounts' => false,
            'has_disability' => false,
            'old_age' => false,
            'date_birth' => '1992-03-16',
            'status' => '1',
            'address' => 'San Vicente - El progreso',
            //'legal_representative' => null,
            'tradename' => null,
            'bussines_name' => null,
            'type' => '1',
            'number_phone1' => '0939120904',
            'number_phone2' => null,
            'email' => 'dbermudez1349@hotmail.com',
        ]);

        PersonEntity::create([
            'cc_ruc' => '1305594333',
            'type_document' => '1',
            'name' => 'ANGELICA YADIRA',
            'last_name' => 'ANDRADE NAVARRETE',
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
            'number_phone1' => '0000000000',
            'number_phone2' => null,
            'email' => 'ayandrade@sanvicente.gob.ec',
        ]);

        PersonEntity::create([
            'cc_ruc' => '0000000000',
            'type_document' => '1',
            'name' => 'WILDER BENJAMIN',
            'last_name' => 'SOLIS ALCIVAR',
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
            'number_phone1' => '0000000000',
            'number_phone2' => null,
            'email' => 'wbsolis@sanvicente.gob.ec',
        ]);
    }
}
