<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeActivity;

class TypeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeActivity::create(['name' => 'FESTIVIDADES SAN PEDRO Y SAN PABLO', 'status' => true]);
        TypeActivity::create(['name' => 'CANTANTE MUSICA NACIONAL', 'status' => true]);
    }
}
