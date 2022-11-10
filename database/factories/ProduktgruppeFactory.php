<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\firma;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\produktgruppe>
 */
class ProduktgruppeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'firmaID' => $this->faker->randomElement(firma::pluck('firmaID')),
            'navn' => $this->faker->company,
            
            
        ];
    }
}
