<?php

namespace Database\Seeders;

use App\Models\Medecin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedecinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer quelques médecins
        Medecin::factory()->count(10)->create();
    }
}
