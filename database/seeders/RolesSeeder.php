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

        $jefe = Role::create(['name' => 'jefe informatica']);
        $jefe->givePermissionTo('menu de administracion');
        $jefe->givePermissionTo('crear personas');
        $jefe->givePermissionTo('editar personas');
        $jefe->givePermissionTo('eliminar personas');
        $jefe->givePermissionTo('ver personas');
        $jefe->givePermissionTo('ver usuarios');
        $jefe->givePermissionTo('editar usuarios');
        $jefe->givePermissionTo('eliminar usuarios');
        $jefe->givePermissionTo('crear usuarios');
        $jefe->givePermissionTo('menu de turismo');
        $jefe->givePermissionTo('crear establecimiento');
        $jefe->givePermissionTo('editar establecimiento');
        $jefe->givePermissionTo('eliminar establecimiento');
        $jefe->givePermissionTo('ver establecimiento');
        $jefe->givePermissionTo('menu de cultura');
        $jefe->givePermissionTo('crear gestor cultural');
        $jefe->givePermissionTo('editar gestor cultural');
        $jefe->givePermissionTo('eliminar gestor cultural');
        $jefe->givePermissionTo('ver gestor cultural');
        $jefe->givePermissionTo('menu de configuraciones');
        $jefe->givePermissionTo('ver roles');
        $jefe->givePermissionTo('crear roles');
        $jefe->givePermissionTo('ver permisos');
        $jefe->givePermissionTo('crear permisos');

        $secretario = Role::create(['name' => 'Secretario/a turismo']);
        $secretario->givePermissionTo('menu de administracion');
        $secretario->givePermissionTo('crear personas');
        $secretario->givePermissionTo('editar personas');
        $secretario->givePermissionTo('eliminar personas');
        $secretario->givePermissionTo('ver personas');
        $secretario->givePermissionTo('menu de turismo');
        $secretario->givePermissionTo('crear establecimiento');
        $secretario->givePermissionTo('editar establecimiento');
        $secretario->givePermissionTo('eliminar establecimiento');
        $secretario->givePermissionTo('ver establecimiento');
        $secretario->givePermissionTo('menu de cultura');
        $secretario->givePermissionTo('crear gestor cultural');
        $secretario->givePermissionTo('editar gestor cultural');
        $secretario->givePermissionTo('eliminar gestor cultural');
        $secretario->givePermissionTo('ver gestor cultural');

        $cultura = Role::create(['name' => 'Analista de cultura']);
        $cultura->givePermissionTo('menu de administracion');
        $cultura->givePermissionTo('crear personas');
        $cultura->givePermissionTo('editar personas');
        $cultura->givePermissionTo('eliminar personas');
        $cultura->givePermissionTo('ver personas');
        $cultura->givePermissionTo('menu de cultura');
        $cultura->givePermissionTo('crear gestor cultural');
        $cultura->givePermissionTo('editar gestor cultural');
        $cultura->givePermissionTo('eliminar gestor cultural');
        $cultura->givePermissionTo('ver gestor cultural');

        $rentas = Role::create(['name' => 'Analista de rentas']);
        $rentas->givePermissionTo('menu de rentas');
        $rentas->givePermissionTo('recaudar');
        $rentas->givePermissionTo('emitir');
        $rentas->givePermissionTo('ver tabla de luaf');
        $rentas->givePermissionTo('editar tabla de luaf');

    }
}
