<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller {

    public function index(): View {
        return view('auth.newsletter');
    }

    public function toggle(): RedirectResponse {
        $currentUser = Auth::user()->id;
        $allResults = Newsletter::all()->where('user_id', $currentUser);
        $isSubscribed = count($allResults) > 0;

        if($isSubscribed) {
            $currentRecord = Newsletter::all()->where('user_id', $currentUser)->first();
            $currentRecord->delete();

            return redirect('home')->with('newsletter_message', 'U bent uitegeschreven voor de niewsbrief!');
        } else {
            $newRecord = new Newsletter();
            $newRecord->user_id = $currentUser;
            $newRecord->save();

            return redirect('home')->with('newsletter_message', 'U bent ingeschreven voor de niewsbrief!');
        }
    }

    public function newsletter($messageSubject, $messageBody) {
        $allSubscribers = Newsletter::all();

        // Loop door alle gebruikers heen van de mail-lijst en voer
        // De interne 'mail' functie op elke gebruiker uit.
        foreach($allSubscribers as $index => $collection) {
            $selectedEntry = Newsletter::all()->find($index + 1);
            $entryUser = $selectedEntry->user;
            $entryUser->mail($messageSubject, $messageBody);
        }
    }

    public function send(): RedirectResponse {
        $messageBody = request('message');
        $messageSubject = request('subject');
        $formattedSubject = sprintf("%s %s", "Legoland Doetinchem | ", $messageSubject);

        $this->newsletter($formattedSubject, $messageBody);
        return redirect('nieuwsbrief/create')->with('newsletter_confirmation', 'Nieuwsbrief verstuurd!');
    }
}
