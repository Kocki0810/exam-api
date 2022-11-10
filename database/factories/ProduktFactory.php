<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\produktgruppe;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produkt>
 */
class ProduktFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));
        $produktgruppeID = $this->faker->randomElement(produktgruppe::pluck('id'));
        
        return [
            // 'gruppeID' => $this->faker->randomElement(produktgruppe::pluck('gruppeID')),
            'produktgruppe_id' => $produktgruppeID,
            'navn' => $this->faker->foodName(),
            'pris' => $this->faker->numberBetween('10', '1000'),
        ];
    }
}
