<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Championship>
 */
class ChampionshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $timezone = config('app.timezone');
        $start = $this->faker->dateTimeBetween('today', 'next Monday +7 days', $timezone);

        return [
            'name' => $this->faker->name,
            'is_current' => $this->faker->boolean,
            'needs_approval' => $this->faker->boolean,
            'description' => $this->faker->text,
            'start_date' => $start,
            'end_date' => $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s') . ' +2 days', $timezone),
            'registration_start_date' => $start,
            'registration_end_date' => $this->faker->dateTimeBetween($start, $start->format('Y-m-d H:i:s') . ' +2 days', $timezone),
        ];
    }
}
