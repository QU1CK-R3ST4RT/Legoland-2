<?php

namespace Database\Seeders;

use App\Models\Attraction;
use App\Models\Contact;
use App\Models\Newsletter;
use App\Models\Order;
use App\Models\OrderRow;
use App\Models\RoomType;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Role;;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accommodation;

class DatabaseSeeder extends Seeder {

    public function run() {
        Ticket::factory(5)->create();
        RoomType::factory()->create();
        Role::factory(3)->create();
        Order::factory(50)->create();
        Contact::factory(10)->create();
        Newsletter::factory(10)->create();
        Attraction::factory(5)->create();
        Accommodation::factory(5)->create();
        OrderRow::factory(150)->create();
    }
}
