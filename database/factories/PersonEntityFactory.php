<?php

namespace Database\Factories;

use App\Models\PersonEntity;
use Illuminate\Database\Eloquent\Factories\Factory;

class PersonEntityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PersonEntity::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cc_ruc' => '13'.$this->faker->randomNumber(8, true),
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'type_document' => '1',
            'maternal_last_name' => $this->faker->lastName(),
            'is_person' => 1,
            'is_required_accounts' => false,
            'has_disability'  => false,
            'old_age'  => false,
            'date_birth' => $this->faker->date(),
            'status' => '1',
            'address' => $this->faker->address(),
            //'legal_representative' => null,
            'tradename' => null,
            'bussines_name' => null,
            'type' => '1',
            'number_phone1' => '09'.$this->faker->randomNumber(8, true),
            'number_phone2' => '09'.$this->faker->randomNumber(8, true),
            'email' => $this->faker->email()
        ];
    }

    public function enterprise(){
        return $this->state([
            'cc_ruc' => '13'.$this->faker->randomNumber(8, true).'001',
            'tradename' => $this->faker->company(),
            'bussines_name' => $this->faker->lastName(),
            'type_document' => '1',
            'is_person' => 0,
            'type' => '2',
        ]);
    }
}
