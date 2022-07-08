@extends('layout')

<head>
    <title>Order {!! $order->id !!} - Legoland Doetinchem</title>
</head>

<body>
    @section('content')
        <div class="mt-8">
            <span class="uppercase text-sm text-gray-600 font-bold">Order #{!! $order->id !!}</span>
            <p>Deze order is gemaakt door gebruiker {!! $order->user_id !!}, ook wel bekend as {!! $order->user->name !!}</p>
            <p>Deze order is gemaakt op {!! $order->created_at !!}</p>
            <p>Deze order heeft {!! count($order->tickets) !!} tickets, met een combinineerde prijs van {!! $order->price() !!} euro.</p>
        </div>

        <div class="mt-8 flex">
            <div class="ml-2 mr-2">
                <a href="/orders/{!! $order->id !!}/edit">
                    <button type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Bewerk Order
                    </button>
                </a>
            </div>

            <div class="ml-2 mr-2">
                <a href="/orders/{!! $order->id !!}/delete">
                    <button type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Verwijder Order
                    </button>
                </a>
            </div>
    @endsection
</body>
