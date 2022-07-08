<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Mail;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /**
     * @var mixed|string
     */
    private mixed $password;
    private mixed $email;

    /**
        * Deze functie haalt de relatie op tussen een ticket en een gebruiker.
        * @return HasMany - Een relatie waar een gebruiker meerdere tickets kan hebben.
    */
    public function tickets(): HasMany {
        return $this->hasMany(Ticket::class, 'id');
    }

    /**
        * Deze functie haalt de relatie op tussen een order en een order.
        * @return HasMany - Een relatie waar een gebruiker meerdere orders kan hebben.
    */
    public function orders(): HasMany {
        return $this->hasMany(Order::class, 'id');
    }

    /**
        * Deze functie haalt de relatie op tussen de gebruiker en een contact submissie.
        * @return HasMany - Een relatie waar een gebruiker meerdere submissies kan hebben.
    */
    public function contact(): HasMany {
        return $this->hasMany(Contact::class, 'id');
    }

    /**
        * Deze functie haalt de relatie op tussen een gebruiker en een abonnee-status op de nieuwsbrief.
        * @return BelongsTo - Een relatie waar de gebruiker deel uitmaakt van een abonnee.
    */
    public function newsletter(): BelongsTo {
        return $this->belongsTo(Newsletter::class, 'user_id', 'user_id');
    }

    /**
        * Deze functie stuurt een mail naar de gebruiker zelf.
        * @param $emailSubject - Het onderwerp van de e-mail.
        * @param $emailBody - De tekst/ opmaak van de e-mail.
        * @return void - Deze functie geeft niks terug, en heeft geen return type.
    */
    public function mail($emailSubject, $emailBody) {
        Mail::to($this->email)->send(new \App\Mail\Newsletter([
            'title' => "$emailSubject",
            'body' => "$emailBody"
        ]));
    }
}
