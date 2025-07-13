<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Certificate>
 */
class CertificateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3),
            'issuer' => $this->faker->company,
            'issued_date' => $this->faker->date(),
            'image' => $this->faker->imageUrl(600, 400, 'certificate', true),
            'certificate_url' => $this->faker->url(),
            'description' => $this->faker->paragraph(),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}
