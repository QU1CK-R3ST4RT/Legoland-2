<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Contact extends Model {
    protected $table = 'contact_items';

    use HasFactory;

    /**
        * Deze functie haalt een gebruiker op uit een contact form.
        * @return HasOne - Een relatie waar een gebruiker per contact form kan  bestaan.
    */
    public function user(): HasOne {
        return $this->hasOne(User::class);
    }
}
