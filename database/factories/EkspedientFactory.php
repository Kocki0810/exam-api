<?php

namespace Database\Factories;

use App\Models\bruger;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ekspedient>
 */
class EkspedientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['male', 'female']);

        return [
            'bruger_id' => $this->faker->randomElement(bruger::pluck('id')),
            'kortnummer' => $this->faker->ean8,
            'navn' => $this->faker->name($gender),
        ];
    }
}
