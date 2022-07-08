@extends('layout')

<head>
    <title>Contact - Legoland Doetinchem</title>
</head>

@section('content')
    <form class="max-w-screen-xl mt-24 px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto text-gray-900 rounded-lg" method="post" action="">
        @csrf
        <div class="flex flex-col justify-between">
            <div>
                <h2 class="text-4xl lg:text-5xl font-bold leading-tight">Heeft u hulp nodig? Laat het ons weten!</h2>
                <p>Ons support team staat 24/7 voor u klaar!</p>
                @if (session('message'))
                    <div class="alert alert-success">
                        <div class=" text-center py-4 lg:px-4">
                            <div class="p-2 bg-yellow-400 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-yellow-300  uppercase px-2 py-1 text-xs font-bold mr-3">Hoppa!</span>
                                <span class="font-semibold mr-2 text-left flex-auto">Uw bericht is verstuurt!</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
        <div>
            <div>
                <span class="uppercase text-sm text-gray-600 font-bold">Volledige Naam</span>
                <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                       type="text" placeholder="Uw Naam" name="naam" value="{!! Auth::user()->name !!}">
            </div>
            <div class="mt-8">
                <span class="uppercase text-sm text-gray-600 font-bold">E-mail</span>
                <input class="w-full bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline"
                       type="text" placeholder="Uw E-mail" name="email" value="{!! Auth::user()->email !!}">
            </div>
            <div class="mt-8">
                <span class="uppercase text-sm text-gray-600 font-bold">Bericht</span>
                <input name="bericht" class="w-full h-32 bg-gray-300 text-gray-900 mt-2 p-3 rounded-lg focus:outline-none focus:shadow-outline">
            </div>
            <div class="mt-8">
                <button
                    class="uppercase text-sm font-bold tracking-wide bg-yellow-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline">
                    Stuur Bericht
                </button>
            </div>
    </form>
@endsection
