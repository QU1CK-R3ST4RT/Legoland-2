<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use mysql_xdevapi\Exception;


class CartController extends Controller
{
    public array $Cart = [];

    public function __construct($Cart)
    {
        return $Cart = [];
    }

    public function add($Cart) {
        try {
            $Cart + [
                'ticket_id' => request('ticket_id'),
                'amount' => request('amount')
            ];
        } catch (Exception $e) {
            dd($e);
        }
        dump($Cart);
    }

    public function getLength($Cart): int{
        return sizeof($Cart);
    }

    public function emptyCart($Cart) {
        $Cart = [];
        dump($Cart);
    }
}
