<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'menu de administracion']);

        Permission::create(['name' => 'crear usuarios']);
        Permission::create(['name' => 'editar usuarios']);
        Permission::create(['name' => 'eliminar usuarios']);
        Permission::create(['name' => 'ver usuarios']);

        Permission::create(['name' => 'crear personas']);
        Permission::create(['name' => 'editar personas']);
        Permission::create(['name' => 'eliminar personas']);
        Permission::create(['name' => 'ver personas']);

        Permission::create(['name' => 'menu de turismo']);

        Permission::create(['name' => 'crear establecimiento']);
        Permission::create(['name' => 'editar establecimiento']);
        Permission::create(['name' => 'eliminar establecimiento']);
        Permission::create(['name' => 'ver establecimiento']);

        Permission::create(['name' => 'menu de cultura']);

        Permission::create(['name' => 'crear gestor cultural']);
        Permission::create(['name' => 'editar gestor cultural']);
        Permission::create(['name' => 'eliminar gestor cultural']);
        Permission::create(['name' => 'ver gestor cultural']);

        Permission::create(['name' => 'crear inventario patrimonial']);
        Permission::create(['name' => 'editar inventario patrimonial']);
        Permission::create(['name' => 'eliminar inventario patrimonial']);
        Permission::create(['name' => 'ver inventario patrimonial']);

        Permission::create(['name' => 'menu de rentas']);

        Permission::create(['name' => 'recaudar']);
        Permission::create(['name' => 'emitir']);
        Permission::create(['name' => 'ver tabla de luaf']);
        Permission::create(['name' => 'editar tabla de luaf']);

        Permission::create(['name' => 'menu de configuraciones']);

        Permission::create(['name' => 'ver roles']);
        Permission::create(['name' => 'crear roles']);
        Permission::create(['name' => 'crear permisos']);
        Permission::create(['name' => 'ver permisos']);

    }
}
