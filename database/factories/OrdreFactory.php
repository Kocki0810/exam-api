<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\firma;
use App\Models\ekspedient;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ordre>
 */
class OrdreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $firma_id = $this->faker->randomElement(firma::pluck('id'));
        $ekspedient_id = $this->faker->randomElement(ekspedient::pluck('id'));

        return [
            'firma_id' => $firma_id,
            'ekspedient_id' => $ekspedient_id,
            'pris' => $this->faker->numberBetween('10', '1000'),
            'date' => $this->faker->dateTimeThisDecade(),
            
        ];
    }
}



// //Laravel 5.0
// DB::table('ekspedient')->where('ekspedient_id', '1')->pluck('navn'); // string("john");
// //Laravel 5.1 
// DB::table('ekspedient')->where('ekspedient_id', '1')->pluck('navn'); // string("john"); NOTICE method pluck has been deprecated
// DB::table('ekspedient')->where('ekspedient_id', '1')->value('navn'); // string("john");
// //Laravel 5.2
// DB::table('ekspedient')->where('ekspedient_id', '1')->pluck('navn'); // array(1) {[0] => string("john")};
// DB::table('ekspedient')->where('ekspedient_id', '1')->pluck('navn')->first(); // string("john");
// DB::table('ekspedient')->where('ekspedient_id', '1')->value('navn'); // string("john");


