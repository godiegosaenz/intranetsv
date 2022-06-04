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
            'web_page' => $this->faker->url(),
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'has_requeriment' => true,
            'has_sewer' => true,
            'has_sewage_treatment_system' => true,
            'has_septic_tank' => true,
            'is_patrimonial' => true,
            'country_id' => 1,
            'province_id' => 13,
            'canton_id' => 109,
            'parish_id' => 308,
            'owner_id' => null,
            'register' => 1,
            'legal_representative_id' => null,
            'establishment_id' => $this->faker->numberBetween(1, 40),
            'tourist_activity_id' => 1,
            'classification_id' => 1,
            'category_id' => 1,
            'username' => 'dbermudez1349@hotmail.com',
        ];
    }

    public function hosteria(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 3,
            'category_id' => $this->faker->numberBetween(5, 7),
            'total_rooms' => $this->faker->numberBetween(1, 10),
            'total_places' => $this->faker->numberBetween(7, 15),
            'total_beds' => $this->faker->numberBetween(1, 10),
        ]);
    }

    public function hostal(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 2,
            'category_id' => $this->faker->numberBetween(3, 5),
            'total_rooms' => $this->faker->numberBetween(1, 5),
            'total_places' => $this->faker->numberBetween(5, 10),
            'total_beds' => $this->faker->numberBetween(1, 10),
        ]);
    }

    public function hacienda_turistica(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 4,
            'category_id' => $this->faker->numberBetween(5, 7),
            'total_rooms' => $this->faker->numberBetween(1, 5),
            'total_places' => $this->faker->numberBetween(5, 10),
            'total_beds' => $this->faker->numberBetween(1, 10),
        ]);
    }

    public function lodge(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 5,
            'category_id' => $this->faker->numberBetween(5, 7),
            'total_rooms' => $this->faker->numberBetween(1, 5),
            'total_places' => $this->faker->numberBetween(5, 10),
            'total_beds' => $this->faker->numberBetween(1, 10),
        ]);
    }

    public function resort(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 6,
            'category_id' => $this->faker->numberBetween(6, 7),
            'total_rooms' => $this->faker->numberBetween(1, 5),
            'total_places' => $this->faker->numberBetween(5, 10),
            'total_beds' => $this->faker->numberBetween(1, 10),
        ]);
    }

    public function hoteles(){
        return $this->state([
            'tourist_activity_id' => 1,
            'classification_id' => 1,
            'category_id' => $this->faker->numberBetween(2, 5),
            'total_rooms' => $this->faker->numberBetween(1, 10),
            'total_places' => $this->faker->numberBetween(7, 15),
            'total_beds' => $this->faker->numberBetween(1, 10),
        ]);
    }

    public function restaurantes(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 12,
            'category_id' => $this->faker->numberBetween(8, 12),
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function bares(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 10,
            'category_id' => $this->faker->numberBetween(13, 14),
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function cafeterias(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 11,
            'category_id' => $this->faker->numberBetween(15, 17),
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function discoteca(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 13,
            'category_id' => $this->faker->numberBetween(15, 17),
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function plaza_comida(){
        return $this->state([
            'tourist_activity_id' => 2,
            'classification_id' => 15,
            'category_id' => 2,
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function agenda_viaje_dual(){
        return $this->state([
            'tourist_activity_id' => 3,
            'classification_id' => 20,
            'category_id' => 1,
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function agenda_viaje_internacional(){
        return $this->state([
            'tourist_activity_id' => 4,
            'classification_id' => 21,
            'category_id' => 1,
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function centros_comunitarios(){
        return $this->state([
            'tourist_activity_id' => 5,
            'classification_id' => 29,
            'category_id' => 1,
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }

    public function parque_atracciones(){
        return $this->state([
            'tourist_activity_id' => 6,
            'classification_id' => 24,
            'category_id' => 1,
            'total_rooms' => 0,
            'total_places' => 0,
            'total_beds' => 0,
        ]);
    }
}
