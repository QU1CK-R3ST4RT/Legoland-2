<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Order extends Model
{
    use HasFactory;

    public function user(): HasOne {
        return $this->hasOne(User::class, 'id');
    }

    public function rows(): HasMany {
        return $this->hasMany(OrderRow::class, 'order_id');
    }

    public function amountOfRows() {
        $count = 0;
        foreach ( OrderRow::all()->where('order_id', $this->id) as $e) {
            $count ++;
        }
        return $count ;
    }

    public function price(): float {
        $allTickets = $this->tickets;
        $totalWorth = 0;

        foreach($allTickets as $index => $collection) {
            $selectedTicket = Ticket::all()->find($index + 1);
            $totalWorth += $selectedTicket->getPrice();
        }

        return $totalWorth;
    }
}
