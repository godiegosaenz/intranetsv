<?php

namespace Database\Factories;

use App\Models\Establishments;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstablishmentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Establishments::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company(),
            'start_date' => $this->faker->date(),
            'registry_number' => $this->faker->randomNumber(5,true),
            'cadastral_registry' => $this->faker->randomNumber('8',true),
            'is_main' => '1',
            'is_branch' => '0',
            'organization_type' => $this->faker->randomNumber('8',true),
            'local' => '1',
            'web_page' => $this->faker->url(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'has_requeriment' => true,
            'has_sewer' => true,
            'has_sewage_treatment_system' => true,
            'has_septic_tank' => true,
            'is_patrimonial' => true,
            'owner_id' => null,
            'legal_representative_id' => null,
            'establishment_id' => 3,
            'tourist_activity_id' => 1,
            'classification_id' => 1,
            'category_id' => 1,
            'username' => 'dbermudez1349@hotmail.com',
            'rooms_number'=> 5,
        ];
    }

    public function hoteles(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 1,
            'category_id' => $this->faker->numberBetween(2, 5),
            'rooms_number'=> $this->faker->numberBetween(1, 20),
        ]);
    }

    public function restaurantes(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 12,
            'category_id' => $this->faker->numberBetween(8, 12),
            'rooms_number'=> 0,
        ]);
    }

    public function bares(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 11,
            'category_id' => $this->faker->numberBetween(15, 17),
            'rooms_number'=> 0,
        ]);
    }

    public function discoteca(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 13,
            'category_id' => $this->faker->numberBetween(15, 17),
            'rooms_number'=> 0,
        ]);
    }

    public function plaza_comida(){

    }
}
