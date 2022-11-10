<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\firma;


class FirmaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Firma::factory()
        ->count(5)
        ->hasProduktgruppe(5)
        ->hasProdukt(10)
        ->hasEkspedient(5)
        ->hasBruger(2)
        ->create();
        
        
    }
}
