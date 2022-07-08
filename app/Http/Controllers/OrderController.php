<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderRow;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller {

    public function index(): View {
        return view("order.index", [
            'orders' => Order::all()
        ]);
    }

    public function get($orderID) {
        $foundOrder = Order::all()->find($orderID);
        $orderExists = isset($foundOrder);

        if($orderExists) {
            return view('order.preview', [
                'order' => $foundOrder
            ]);
        } else {
            abort(404);
        }
    }

    public function createOrder() {
        session_start();

        $order = new Order();
        $order->user_id = Auth::user()->id;
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;
        $order->save();

        if (!isset($_SESSION['orderID'])) { $_SESSION['orderID'] = sqlite_last_insert_rowid(); } else {  }

        if (request("type1")) {
            $row = new OrderRow();
            $row->ticket_id = request('type1');
            $row->order_id = sqlite_last_insert_rowid();
        }

        return redirect('attractions-admin');
    }

    public function edit($orderID) {
        $foundOrder = Order::all()->find($orderID);
        $foundRows = OrderRow::all()->where('order_id', $orderID);
        $orderExists = isset($foundOrder);

        if($orderExists) {
            return view('order.edit', [
                'order' => $foundOrder,
                'Rows' => $foundRows
            ]);
        } else {
            abort(404);
        }
    }

    public function update($orderID): RedirectResponse {
        $request = request();
        $request->validate([
            'user_id' => 'required',
            'ticket_type' => 'required',
        ]);

        $foundOrder = Order::all()->find($orderID);
        $foundOrder->user_id = request('user_id');
        $foundOrder->ticket_type = request('ticket_type');
        $foundOrder->save();
        $foundOrder->refresh();

       return redirect("orders/$orderID/edit");
    }

    public function delete($orderID): RedirectResponse|null {
        $foundOrder = Order::all()->find($orderID);
        $foundRows = OrderRow::all()->where('order_id' ,$orderID);
        $orderExists = isset($foundOrder);
        $rowExists = isset($foundRows);

        if($orderExists && $rowExists) {
            foreach ($foundRows as $e) {
                $e->delete();
            }
            $foundOrder->delete();
            return redirect("orders");
        } else {
            abort(404);
        }
    }
}
