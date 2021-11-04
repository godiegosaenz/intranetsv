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
            'cc_ruc' => $this->faker->randomNumber(10, true),
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'maternal_last_name' => $this->faker->lastName(),
            'is_person' => 1,
            'status' => '1',
            'people_entities_id' => 1,
        ];
    }
}
