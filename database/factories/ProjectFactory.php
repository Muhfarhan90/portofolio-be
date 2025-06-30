<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence(3);
        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->paragraph(),
            'tech_stack' => implode(', ', $this->faker->words(3)),
            'repo_url' => $this->faker->url(),
            'live_url' => $this->faker->url(),
            'image' => 'https://source.unsplash.com/600x400/?portfolio,' . $this->faker->word(),
        ];
    }
}
