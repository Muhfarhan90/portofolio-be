<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $institution = $this->faker->randomElement([
            'Universitas Airlangga',
            'Institut Teknologi Sepuluh Nopember',
            'Universitas Indonesia',
            'Universitas Gadjah Mada',
            'Universitas Brawijaya'
        ]);

        $major = $this->faker->randomElement([
            'Informatika',
            'Sistem Informasi',
            'Teknik Komputer',
            'Teknik Elektro',
            'Teknologi Informasi'
        ]);

        $startYear = $this->faker->year();
        $endYear = (int) $startYear + rand(3, 5);

        return [
            'institution' => $institution,
            'degree' => $this->faker->randomElement(['S1', 'D3', 'S2']),
            'major' => $major,
            'location' => $this->faker->city,
            'start_year' => $startYear,
            'end_year' => $endYear,
            'gpa' => $this->faker->randomFloat(2, 2.50, 4.00),
            'is_current' => false,
            'description' => $this->faker->sentence(10),
        ];
    }
}
