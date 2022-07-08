<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attraction>
 */
class AttractionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        return [
            'height' => $this->faker->randomFloat(100.0, 150.0),
            'capacity' => $this->faker->numberBetween(10, 15),
            'image' => 'https://cdn.discordapp.com/attachments/981812387495690262/981812648477855774/UNTAMED-ALG-01.jpg',
            'description' => "standaard attractie text"
        ];
    }
}
