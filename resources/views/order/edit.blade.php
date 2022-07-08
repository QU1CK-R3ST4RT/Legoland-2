@extends('layout')

@section('content')
    <div class="w-full m-10 bg-gray-200 p-5 rounded-md shadow-md">
        <label for="" class="text-3xl ">Order</label>
        <div class="grid grid-cols-4 mt-10 ml-5 text-2xl">
            <div class="font-bold">id:</div>
            <div class="font-bold">user id:</div>
            <div class="font-bold">naam:</div>
            <div class="font-bold">email:</div>
        </div>
        <div class="grid grid-cols-4 ml-5 mb-5 text-xl">
            <div class="">
                {{ $order->id }}
            </div>
            <div class="">
                {{ $order->user_id }}
            </div>
            <div class="">
                {{ $order->name }}
            </div>
            <div class="mb-5">
                {{ $order->email }}
            </div>
        </div>
        <div class="border-b-2 border-gray-800 mb-10"></div>
        <label for="" class="text-3xl mt-10">besteld</label>
        <div class="grid grid-cols-4 mt-10 ml-5 text-2xl">
            <div class="font-bold">id:</div>
            <div class="font-bold">ticket id:</div>
            <div class="font-bold">hoeveelheid:</div>
            <div class="font-bold">prijs per:</div>
        </div>

        <div class="mb-10 pt-3">
            @php($orderTotal= 0.0)

            @foreach($Rows as $e)
                @php($currentTicket = \App\Models\Ticket::all()->find($e->ticket_id))
                @php($orderTotal += $currentTicket->price * $e->amount)
                <div class="grid grid-cols-4 ml-5 mb-1 text-xl">
                    <div class="">{{ $e->id }}</div>
                    <div class="">{{ $e->ticket_id }}</div>
                    <div class="">{{ $e->amount }}</div>
                    <div class="">€{{ $currentTicket->price }}0,-</div>
                </div>
                @if($loop->last)

                @else
                <div class="my-5 border-b border-gray-800"></div>
                @endif
            @endforeach
        </div>
        <div class="border-b-2 border-gray-800"></div>

        <div class="grid text-2xl grid-cols-4 mt-10">
            <div class="font-bold">totaal:</div>
        </div>
        <div class="grid text-xl grid-cols-4 mb-1 tracking-wider">
            <div class="">€{{ $orderTotal }}0,-</div>
        </div>
    </div>
@endsection

