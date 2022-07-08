<?php

namespace Database\Factories;

use App\Models\RoomType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AccommodationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'taken' => 0,
            'name' => "attractie",
            'room_type' => RoomType::factory()->create(),
            'user_id' => User::factory()->create(),
            'image' => 'https://cdn.discordapp.com/attachments/981812387495690262/982187529619001344/231398617.jpg',
            'description' => "standaard attractie text"
        ];
    }
}
