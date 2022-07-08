<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderAuthenticate
{
    /**
        * Deze functie bekijkt of een gebruiker een order mag bekijken.
        * @param Request $request
        * @param Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
        * @return Response|RedirectResponse|void - Deze functie geeft een redirect terug als alles goed gaat, zo niet, geeft deze een 403 abort terug.
    */
    public function handle(Request $request, Closure $next): Response|RedirectResponse|null {
        $orderID = $request['order'];
        $orderArgument = Order::all()->find($orderID);

        // Als er een order bestaat met dit ID, kijken we verder.
        if($orderArgument) {
            $orderUserID = $orderArgument->user_id;
            $currentUser = auth()->user();

            // Bestaat er een huidige gebruiker?
            // Vergelijk deze dan met de order zelf.
            if ($currentUser) {
                $currentUserID = Auth::user()->id;
                $currentUserRole = Auth::user()->role_id;
                $orderMatches = ($orderUserID == $currentUserID);

                // Als de order matcht, of de gebruiker heeft een
                // Beheerdersrol, laat dan de order zien.
                if ($orderMatches || $currentUserRole >= 2) {
                    return $next($request);
                }
            } else {
                abort(403);
            }
        } else {
            abort(404, "Pagina niet gevonden");
        }

        abort(403);
    }
}
