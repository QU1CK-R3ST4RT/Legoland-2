@extends('layout')

<head>
    <title>Home - Legoland Doetinchem</title>
</head>

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 m-5">
        @foreach(\App\Models\Accommodation::all() as $item)
            @component('components.single-accomodation')
                @slot('name')
                    {{$item->name}}
                @endslot
                @slot('src')
                    {{$item->image}}
                @endslot

                @slot('desc')
                    {{$item->description}}
                @endslot

                @slot('taken')
                        <p>
                            @if($item->taken == 1)
                                <b class="text-red-600">deze accomodatie is bezet</b>
                            @else
                                <b class="text-green-600">deze accomodatie is nog beschikbaar</b>
                            @endif
                        </p>
                @endslot

                @slot('room_type')
                    {{$item->room_type}}
                @endslot
                @slot('html')
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                            <div class="mt-4">
                                <a href="/accommondations/{{ $item->id }}/edit" class="mr-2 bg-yellow-600 rounded-md text-white px-3 py-2 hover:text-black font-bold hover:text-lg text-md">Edit</a>
                            </div>
                        @endif
                    @endif
                @endslot
            @endcomponent
        @endforeach
    </div>
@endsection
