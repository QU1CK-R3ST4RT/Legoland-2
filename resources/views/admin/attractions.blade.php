@extends('layout')

@section('content')
    <div class="text-center font-bold mt-10">
        <div class="grid grid-cols-7 mt-5">
            <p class="font-bold border-r-2 border-gray-800 text-xl">afbeelding</p>
            <p class="font-bold border-r-2 border-gray-800 text-xl">naam</p>
            <p class="font-bold border-r-2 border-gray-800 text-xl">hoogte</p>
            <p class="font-bold border-r-2 border-gray-800 text-xl">plaatsen</p>
            <p class="font-bold border-r-2 border-gray-800 text-xl">beschrijving</p>
            <p class="font-bold border-r-2 border-gray-800 text-xl">bewerk</p>
            <p class="font-bold border-r-2 border-gray-800 text-xl">verwijder</p>
        </div>
        <ul>
            @foreach($attractions  as $e)
                <li>
                    <div class="grid grid-cols-7">
                        <img class="rounded-md w-full px-3 mt-5" src="{{ $e->image }}">
                        <p class="flex items-center px-3 mt-5 border-l-2 border-gray-800"><b> {{ $e->name }} </b></p>
                        <p class="flex items-center px-3 mt-5 border-l-2 border-gray-800">{{$e->height}}</p>
                        <p class="flex items-center px-3 mt-5 border-l-2 border-gray-800">{{$e->capacity}}</p>
                        <p class="flex items-center px-3 mt-5 border-l-2 border-gray-800"> {{ $e->description }} </p>
                        <div class=" flex items-center justify-center mt-5 border-l-2 border-gray-800">
                            <a href="/attractions/{{ $e->id }}/edit" class="mr-2 bg-yellow-600 rounded-md text-white px-8 py-5 hover:text-black font-bold hover:text-lg text-md">Edit</a>
                        </div>

                        <a href="/attractions/{{ $e->id }}/delete" class=" border-l-2 border-gray-800 flex mt-5 items-center justify-center hover:text-yellow-600 font-bold hover:text-lg text-md">Delete</a>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="font-bold text-5xl px-3 mt-24">Aanmaken</div>
    <div>
        <form class="grid grid-cols-1 md:grid-cols-2 px-3 mt-5" action="" method="POST" name="create">
            @csrf
            <div>

                <div class="mt-5">
                    <label class="font-bold mt-5 text-xl tracking-wide mb-1" for="image">afbeelding</label>
                    <input class="p-1 shadow-lg border border-2 border-gray-500 rounded-md w-full text-gray-800 font-bold" type="text" name="image" required>
                </div>

                <div class="mt-5">
                    <label class="font-bold mt-5 text-xl tracking-wide mb-1" for="capacity">plaatsen</label>
                    <input class="p-1 shadow-lg border border-2 border-gray-500 rounded-md w-full text-gray-800 font-bold" type="number" name="capacity" required>
                </div>

                <div class="mt-5">
                    <label class="font-bold mt-5 text-xl tracking-wide mb-1" for="name">naam</label>
                    <input class="p-1 shadow-lg border border-2 border-gray-500 rounded-md w-full text-gray-800 font-bold" type="text" name="name" required>
                </div>

                <div class="mt-5">
                    <label class="font-bold mt-5 text-xl tracking-wide mb-1" for="height">hoogte</label>
                    <input class="p-1 shadow-lg border border-2 border-gray-500 rounded-md w-full text-gray-800 font-bold" type="text" name="height" required>
                </div>

                <div class="mt-5">
                    <label class="font-bold mt-5 text-xl tracking-wide mb-1" for="description">beschrijving</label>
                    <input class="p-1 shadow-lg border border-2 border-gray-500 rounded-md w-full text-gray-800 font-bold" type="text" name="description" required>
                </div>

                <button type="submit" name="edit" class="bg-yellow-500 px-3 py-1 w-full mt-5 md:w-[20%] text-xl text-white font-bold hover:text-black rounded-md" required>
                    Verstuur
                </button>
            </div>
        </form>
    </div>
@endsection
