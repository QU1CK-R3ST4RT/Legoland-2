<?php

namespace App\Http\Middleware;

use App\Http\Controllers\AuthController;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdministratorAuthentication
{
    public function handle(Request $request, Closure $next)
    {
        $newAuthenticator = new AuthController();
        $isLoggedIn = $newAuthenticator->IsLoggedIn();

        if(!$isLoggedIn) {
            abort(403);
        } else {
            $currentUser = auth()->user();
            $currentUser_roleID = $currentUser->role_id;
            $roleValid = $currentUser_roleID >= 2;

            if($roleValid) {
                return $next($request);
            } else {
                abort(403);
            }
        }
    }
}
