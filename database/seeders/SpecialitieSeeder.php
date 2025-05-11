<?php

namespace Database\Seeders;

use App\Models\Specialitie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialitieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer quelques spécialités
        Specialitie::factory()->count(5)->create();
    }
}
