<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\Request;

class RegisterAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        $newAuthenticator = new AuthController();
        $isLoggedIn = $newAuthenticator->IsLoggedIn();

        // Als de gebruiker nog niet ingelogt is, kan zij/haar registreren.
        if($isLoggedIn) {
            abort(403);
        } else {
            return $next($request);
        }
    }
}
