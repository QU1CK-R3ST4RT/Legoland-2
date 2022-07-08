@extends('layout')

<head>
    <title>Home - Legoland Doetinchem</title>
</head>

@section('content')
     <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 m-5">
        @foreach(\App\Models\Attraction::all() as $item)
            @component('components.single-attraction')
                @slot('name')
                     {{$item->name}}
                @endslot
                @slot('src')
                    {{$item->image}}
                @endslot
                @slot('desc')
                    {{$item->description}}
                @endslot
                @slot('cap')
                    {{$item->capacity}}
                @endslot
                @slot('height')
                    {{$item->height}}
                @endslot
                @slot('html')
                    @if(\Illuminate\Support\Facades\Auth::user())
                        @if(\Illuminate\Support\Facades\Auth::user()->role_id == 2)
                            <div class="mt-4">
                                <a href="/attractions/{{ $item->id }}/edit" class="mr-2 bg-yellow-600 rounded-md text-white px-3 py-2 hover:text-black font-bold hover:text-lg text-md">Edit</a>
                            </div>
                        @endif
                    @endif
                @endslot
            @endcomponent
        @endforeach
     </div>
@endsection
