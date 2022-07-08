@extends('layout')

<head>
    <title>Home - Legoland Doetinchem</title>
</head>

@section('content')
    <section class="text-gray-600 body-font">
        <div class="container mx-auto flex px-5 py-24 md:flex-row flex-col items-center">
            <div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">
                <h1 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">Legoland Doetinchem
                    <br class="hidden lg:inline-block">Nieuw en Verbeterd!
                </h1>

                <p class="mb-8 leading-relaxed">Ervaar de actie en sfeer van Legoland vanaf nu ook in Doetinchem!</p>
                <div class="flex justify-center">
                    <a href="login"><button class="inline-flex text-white bg-yellow-500 border-0 py-2 px-6 focus:outline-none hover:bg-yellow-600 rounded text-lg">Log In</button></a>
                </div>
            </div>
            <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
                <img class="object-cover object-center rounded" alt="hero" src="https://media1.giphy.com/media/XmQUTyl1UwgOanOp6D/giphy.gif?cid=a267dfa32p95e4jn461j6z478y0f94eard29o9s2a011sz5m&rid=giphy.gif&ct=s&1648512000064">
            </div>
        </div>
    </section>
@endsection
