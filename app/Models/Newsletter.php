<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use PhpParser\Node\Expr\Array_;

class Newsletter extends Model {
    protected $table = 'newsletter_subscribers';

    use HasFactory;

    /**
        * Deze functie haalt de relatie tussen een gebruiker en een abonnee op.
        * @return HasOne - Een relatie waar er een gebruiker bestaat per record.
    */
    public function user(): HasOne {
       return $this->hasOne(User::class, 'id');
    }

    /**
        * Deze functie haalt op of de gebruiker is geabonneerd op de nieuwbrief.
        * @param $userID - Het ID van de gebruiker.
        * @return bool - Of de gebruiker geabonneerd is.
    */
    public function isSubscribed($userID): bool {
        $allResults = Newsletter::all()->where('user_id', $userID);
        return (count($allResults) > 0);
    }
}
