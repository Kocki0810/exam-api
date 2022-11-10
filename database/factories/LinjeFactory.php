<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ordre;
use App\Models\produkt;
use Illuminate\Support\Facades\DB;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\linje>
 */
class LinjeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $produktID = $this->faker->randomElement(produkt::pluck('id'));
        

        return [
            'produkt_id' => $produktID,
            // 'ordreID' => $this->faker->randomElement(ordre::pluck('ordreID')),
            'bontekst' => DB::table('produkter')->where('id', $produktID)->value('navn'),
            'pris' => $this->faker->numberBetween('10', '1000'),
            'antal' => $this->faker->numberBetween('1', '10'),
            'date' => $this->faker->dateTimeThisDecade(),
        ];
    }
}
