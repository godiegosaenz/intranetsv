<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'administrador']);
        Role::create(['name' => 'jefe informatica']);
        Role::create(['name' => 'Secretario/a turismo']);
        Role::create(['name' => 'Anailista de rentas']);
    }
}
