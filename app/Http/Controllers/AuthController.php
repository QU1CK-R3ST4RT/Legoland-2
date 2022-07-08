<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller {

    public function index(): View {
        return view('auth.login');
    }

    public function IsLoggedIn(): bool {
        return auth()->user() !== null;
    }

    public function register(): RedirectResponse {

        $userExists = count( User::all()->where('email', request("email"))) != 0;

        if(!$userExists) {
            $user = new User();
            $user->password = Hash::make(request('password'));
            $user->email = request('email');
            $user->name = sprintf("%s %s", request('voornaam'), request('achternaam'));
            $user->role_id = 1;
            $user->save();

            return redirect('login')->with(['message' => 'Uw account is aangemaakt!']);
        } else {
            return redirect('login')->with(['message' => "Er ging iets fout terwijl we uw account aan het opzetten waren."]);
        }
    }

    public function login(): RedirectResponse {
        $email = request('email');
        $plainPassword = request('password');

        $user = User::all()->where('email', $email)->first();
        $userExits = isset($user);

        if($userExits) {
            $passwordMatches = Hash::check($plainPassword, $user->password);

            if($passwordMatches) {
                Auth::login($user, true);
                return redirect('login')->with(['login_success' => 'Welkom terug!']);
            }
        }

        return redirect('login')->with(['error' => 'Aanmelden mislukt.']);
    }

    public function logout(): RedirectResponse {
        Auth::logout();
        return redirect('login');
    }
}
