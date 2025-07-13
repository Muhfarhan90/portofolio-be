<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-10 years', 'now');
        $endDate = $this->faker->optional()->dateTimeBetween($startDate, 'now');

        return [
            'company_name' => $this->faker->company(),
            'role' => $this->faker->jobTitle(),
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => $endDate?->format('Y-m-d'),
            'description' => $this->faker->paragraph(),
        ];
    }
}
