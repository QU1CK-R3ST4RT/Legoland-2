<?php

namespace Database\Factories;

use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition() {
        $name = $this->faker->name();
        $email =  $this->faker->email();
        return [
            'user_id' => User::factory()->create(['name'=> $name, 'email' => $email]),
            'name' => $name,
            'email' => $email,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
