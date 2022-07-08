@extends('layout')

{{--
    builds a form based on resieved data. checks the names of the keys
     and returns this as string to be used for the label and form control name than
    puts the value of the key inside of the input box. this uses a foreach loop and the singular item is called $e
--}}

@section('content')
<form action="" class="grid grid-cols-1 md:grid-cols-2" method="POST">
    @csrf
    <div class="flex flex-col w-full p-5">
        @foreach($Data->getAttributes() as $e)
            @php($key = array_search($e, $Data->getAttributes()))
            @if($key == "created_at" |  $key == "updated_at" | $key == "id")
            @else
                <label class="font-bold mt-5 text-xl tracking-wide mb-1" for="{{ $key }}">{{ $key }}</label>
                <input class="p-1 shadow-lg border border-2 border-gray-500 rounded-md w-full text-gray-800 font-bold" type="text" name="{{ $key }}" value="{{ $e }}" >
            @endif
            @if($key == "image")
                @php($imageSRC = $e)
            @endif
        @endforeach
        <div class="">
            <button type="submit" name="edit" class="bg-yellow-500 px-3 py-1 w-full mt-5 md:w-[20%] text-xl text-white font-bold hover:text-black rounded-md">
                Verstuur
            </button>
        </div>
    </div>
    <div class="p-5 md:p-10">
        <div class="m-5 bg-gray-200 rounded-t-md shadow-lg">
            @if($imageSRC)
                <div class="flex justify-center">
                    <img src="{{ $imageSRC }}" class="rounded-md w-full">
                </div>
            @endif
            <div class="flex flex-col p-5 text-lg">
                @foreach($Data->getAttributes() as $e)
                    @php($key = array_search($e, $Data->getAttributes()))
                    @if($key == "created_at" | $key == "updated_at" | $key == "image")
                    @else
                        <p><b>{{ $key }}</b>{{" = ".$e}}</p>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</form>

@endsection
