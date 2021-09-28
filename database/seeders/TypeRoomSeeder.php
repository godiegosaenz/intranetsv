<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\TypeRoom;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeRoom::create(['name' => 'Habitacion simple', 'status' => true]);
        TypeRoom::create(['name' => 'Habitacion doble', 'status' => true]);
        TypeRoom::create(['name' => 'Habitacion triple', 'status' => true]);
        TypeRoom::create(['name' => 'Habitacion cuadruple', 'status' => true]);
        TypeRoom::create(['name' => 'Habitacion multiple', 'status' => true]);
        TypeRoom::create(['name' => 'Habitacion Junior suite', 'status' => true]);
        TypeRoom::create(['name' => 'Habitacion suite', 'status' => true]);
    }
}
