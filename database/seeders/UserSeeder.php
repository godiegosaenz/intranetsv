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
        User::create([
            'name' => 'Diego',
            'email' => 'dbermudez1349@hotmail.com',
            'password' => bcrypt('Bersaenz16'),
            'status' => true,
            'people_entities_id' => 1,
        ]);
    }
}
