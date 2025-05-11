<?php

namespace Database\Factories;

use App\Models\Audience;
use App\Models\Medecin;
use App\Models\Specialitie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agenda>
 */
class AgendaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'medecin_id' => Medecin::factory(),
            'day_of_week' => fake()->dateTimeBetween('now', '+1 month')->format('Y-m-d'),
            'start_time' => fake()->time('H:i'),
            'end_time' => fake()->time('H:i'),
            // 'status' => Audience::factory(),

        ];
    }
}
