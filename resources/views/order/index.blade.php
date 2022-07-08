@extends('layout')

@section('content')
    <div class="text-center font-bold mt-10 p-10">
        <div class="grid grid-cols-7 mt-5">
            <p class="font-bold border-l-2 border-gray-800 text-xl">id</p>
            <p class="font-bold border-l-2 border-gray-800 text-xl">user_id</p>
            <p class="font-bold border-l-2 border-gray-800 text-xl">name</p>
            <p class="font-bold border-l-2 border-gray-800 text-xl">email</p>
            <p class="font-bold border-l-2 border-gray-800 text-xl">besteld</p>
            <p class="font-bold border-l-2 border-gray-800 text-xl">bewerk</p>
            <p class="font-bold border-l-2 border-gray-800 text-xl">verwijder</p>
        </div>
        <ul>
            @foreach($orders as $e)
                <li>
                    <div class="grid grid-cols-7">
                        <p class="flex items-center text-center px-5 mt-5 border-l-2 border-gray-800 text-green-600"><b> {{ $e->id }} </b>
                        <p class="flex items-center text-center px-5 mt-5 border-l-2 border-gray-800"><b> {{ $e->user_id }} </b></p>
                        <p class="flex items-center text-center px-5 mt-5 border-l-2 border-gray-800">{{$e->name}}</p>
                        <p class="flex items-center text-center px-5 mt-5 border-l-2 border-gray-800">{{$e->email}}</p>
                        <p class="flex items-center text-center px-5 mt-5 border-l-2 border-gray-800">{{$e->amountOfRows()}}</p>
                        <div class=" flex items-center justify-center mt-5 border-l-2 border-gray-800">
                            <a href="/orders/{{ $e->id }}/edit" class="mr-2 bg-yellow-600 rounded-md text-white px-8 py-5 hover:text-black font-bold hover:text-lg text-md">weergeven</a>
                        </div>

                        <a href="/orders/{{ $e->id }}/delete" class=" border-l-2 border-gray-800 flex mt-5 items-center justify-center hover:text-yellow-600 font-bold hover:text-lg text-md">verwijderen</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
