<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LoggedInAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return Response|RedirectResponse
     */
    public function handle(Request $request, Closure $next): Response|RedirectResponse {
        $newAuthenticator = new AuthController();
        $isLoggedIn = $newAuthenticator->IsLoggedIn();

        if(!$isLoggedIn) {
            return redirect('login')->with(['message' => 'Log alstublieft in.']);
        } else {
            return $next($request);
        }
    }
}
