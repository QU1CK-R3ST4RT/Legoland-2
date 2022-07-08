<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class PageController extends Controller {

    public function home(): View {
        return view('home');
    }

    public function index($pageArgument): View {
        return match ($pageArgument) {
            "home" => view('home'),
            "contact" => view('contact'),
            'informatie' => view('informatie'),
            'login' => view('auth.login'),
            'registreer' => view('auth.registreer'),
            'attracties' => view('attractions'),
            'accommodatie' => view('accommodation'),
            default => view('404'),
        };
    }
}
