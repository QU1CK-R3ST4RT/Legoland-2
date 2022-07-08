@extends('layout')

<head>
    <title>Ticket {!! $ticket->id !!} - Legoland Doetinchem</title>
</head>

<body>
@section('content')
    <div class="mt-8">
        <span class="uppercase text-sm text-gray-600 font-bold">Ticket #{!! $ticket->id !!}</span>
        <p>Deze ticket is gemaakt door gebruiker {!! $ticket->user_id !!}, ook wel bekend as {!! $ticket->user->name !!}</p>
        <p>Deze ticket is gemaakt op {!! $ticket->created_at !!}</p>
        <p>En heeft het ticket type {!! $ticket->ticket_type !!} met een prijs van {!! $ticket->getPrice() !!} euro per stuk.</p>
        <p>De order waar deze ticket bij hoort is {!! $ticket->order->id !!}</p>
    </div>

    <div class="mt-8 flex">
    <div class="ml-2 mr-2">
        <a href="/tickets/{!! $ticket->id !!}/edit">
            <button type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Bewerk Ticket
            </button>
        </a>
    </div>

    <div class="ml-2 mr-2">
        <a href="/tickets/{!! $ticket->id !!}/delete">
            <button type="submit" class="group relative flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-red-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Verwijder Ticket
            </button>
        </a>
    </div>
    </div>


@endsection

</body>
