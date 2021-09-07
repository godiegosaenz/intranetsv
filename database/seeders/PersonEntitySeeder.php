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
            'name' => 'Diego Andres',
            'last_name' => 'Bermudez',
            'maternal_last_name' => 'Saenz',
            'is_person' => true,
            'date_birth' => '1992-03-16',
            'status' => '1',
            'address' => 'San Vicente - El progreso',
            'legal_representative' => null,
            'tradename' => null,
            'bussines_name' => null,
            'type' => 'natural',
            'number_phone1' => '0939120904',
            'number_phone2' => null,
            'email' => 'dbermudez1349@hotmail.com',
            'country_id' => 1,
            'province_id' => 13,
            'canton_id' => 109,
            'parish_id' => 308,
        ]);

        PersonEntity::create([
            'cc_ruc' => '1314801465',
            'name' => 'Juan',
            'last_name' => 'Parraga',
            'maternal_last_name' => 'Saenz',
            'is_person' => true,
            'date_birth' => '2000-08-07',
            'status' => '1',
            'address' => 'Leonidas Plaza',
            'legal_representative' => null,
            'tradename' => null,
            'bussines_name' => null,
            'type' => 'natural',
            'number_phone1' => '0939120904',
            'number_phone2' => null,
            'email' => 'juanjesusparraga@hotmail.com',
            'country_id' => 1,
            'province_id' => 13,
            'canton_id' => 109,
            'parish_id' => 308,
        ]);

        PersonEntity::create([
            'cc_ruc' => '1314676725',
            'name' => 'Gabriela',
            'last_name' => 'Loor',
            'maternal_last_name' => 'Cano',
            'is_person' => true,
            'date_birth' => '1997-05-27',
            'status' => '1',
            'address' => 'San Vicente - El progreso',
            'legal_representative' => null,
            'tradename' => null,
            'bussines_name' => null,
            'type' => 'natural',
            'number_phone1' => '0939120945',
            'number_phone2' => null,
            'email' => 'gabyloorcano@gmail.com',
            'country_id' => 1,
            'province_id' => 13,
            'canton_id' => 109,
            'parish_id' => 308,
        ]);
    }
}
