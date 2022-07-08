<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderRow>
 */
class OrderRowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'ticket_id' => Ticket::all()->find($this->faker->numberBetween(1,5))->id,
            'order_id' => Order::all()->find($this->faker->numberBetween(1,50))->id,
            'amount' => $this->faker->numberBetween(1,10)
        ];
    }
}
