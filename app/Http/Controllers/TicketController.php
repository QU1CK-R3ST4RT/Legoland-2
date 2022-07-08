<?php

namespace App\Http\Controllers;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TicketController extends Controller {

    public function order(): View {
        return view('ticket.order', [
            'tickets' => Ticket::all()
        ]);
    }

    public function index() {
        return view("ticket.index", [
            'tickets' => Ticket::all()
        ]);
    }

    public function get($ticketID) {
        $foundTicket = Ticket::all()->find($ticketID);
        $ticketExists = isset($foundTicket);

        if($ticketExists) {
            return view('ticket.preview', [
                'ticket' => $foundTicket
            ]);
        } else {
            abort(404);
        }
    }

    public function edit($ticketID) {
        $foundTicket = Ticket::all()->find($ticketID);
        $ticketExists = isset($foundTicket);

        if($ticketExists) {
            return view('ticket.edit', [
                'ticket' => $foundTicket
            ]);
        } else {
            abort(404);
        }
    }

    public function update($ticketID) {
        $request = request();
        $request->validate([
            'user_id' => 'required',
            'ticket_type' => 'required',
        ]);

        $foundTicket = Ticket::all()->find($ticketID);
        $foundTicket->user_id = request('user_id');
        $foundTicket->ticket_type = request('ticket_type');
        $foundTicket->save();
        $foundTicket->refresh();

        return redirect("tickets/$ticketID/edit");
    }

    public function delete($ticketID): RedirectResponse|null {
        $foundTicket = Ticket::all()->find($ticketID);
        $ticketExists = isset($foundTicket);

        if($ticketExists) {
            $foundTicket->delete();
            return redirect("tickets");
        } else {
            abort(404);
        }
    }
}
