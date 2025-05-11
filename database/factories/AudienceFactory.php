<?php

namespace Database\Factories;

use App\Models\Audience;
use App\Models\Client;
use App\Models\Medecin;
use App\Models\Specialitie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Audience>
 */
class AudienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'client_id' => Client::factory(),
            'medecin_id' => Medecin::factory(),
            'speciality_id' => Specialitie::factory(),
            'scheduled_at' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            // 'status' => fake()->name(),
            'reason' => fake()->name(),

        ];
    }
}
