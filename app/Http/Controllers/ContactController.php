<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ContactController extends Controller {

    public function index(): View {
        return view('contact');
    }

    public function store(): RedirectResponse {
        $newForm = new Contact();
        $newForm['user_id'] = Auth::user()->id;
        $newForm['message'] = request('bericht');
        $newForm->save();
        $newForm->refresh();

        return redirect('contact')->with('message', 'Bericht is verstuurd!');
    }
}
