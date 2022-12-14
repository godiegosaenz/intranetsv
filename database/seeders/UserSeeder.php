<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = User::create([
            'name' => 'DIEGO',
            'email' => 'dabermudez@sanvicente.gob.ec',
            'password' => bcrypt('Bersaenz16'),
            'status' => true,
            'people_entities_id' => 1,
        ]);

        $u->assignRole('jefe informatica');

        $angelica = User::create([
            'name' => 'ANGELICA',
            'email' => 'ayandrade@sanvicente.gob.ec',
            'password' => bcrypt('1305594333'),
            'status' => true,
            'people_entities_id' => 2,
        ]);
        $angelica->assignRole('Secretario/a turismo');

        $wilder = User::create([
            'name' => 'WILDER',
            'email' => 'wbsolis@sanvicente.gob.ec',
            'password' => bcrypt('123456789'),
            'status' => true,
            'people_entities_id' => 3,
        ]);
        $wilder->assignRole('Analista de cultura');
    }
}
