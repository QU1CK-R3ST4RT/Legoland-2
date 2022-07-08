@extends('layout')

<head>
    <title>Home - Legoland Doetinchem</title>
</head>

{{--laat knoppen zien naar admin index pagina's--}}
@section('content')
    <div class="container">

        <h2 class="text-4xl font-bold mt-10 mx-10">Administratie</h2>

        <div class="container flex justify-left flex-row mb-10">
            <a href="orders"><button class="transition duration-700 ease-in-out flex flex-col justify-center items-center mt-24 mx-10 font-bold hover:text-yellow-400 hover:text-yellow-400 hover:rotate-6 hover:mt-16 hover:text-xl text-lg p-5 border-gray-500 border-4 rounded-md shadow-md">
                <img class="h-[72px] w-[72px]" src="img/order.svg" alt="">
                    <p class="text-center font-bold text-xl">ORDERS</p>
                </button>
            </a>
            <a href="nieuwsbrief/create"><button class="transition duration-700 ease-in-out flex flex-col justify-center items-center mt-24 mx-10 font-bold hover:text-yellow-400 hover:text-yellow-400 hover:rotate-6 hover:mt-16 hover:text-xl text-lg p-5 border-gray-500 border-4 rounded-md shadow-md>Nieuwsbrief">
                    <img class="h-[72px] w-[72px]" src="img/maillist.svg" alt="">
                    <p class="text-center font-bold text-xl">NIEUWSBRIEF</p>
                </button></a>
            <a href="/accommondations-admin/"><button class="transition duration-700 ease-in-out flex flex-col justify-center items-center mt-24 mx-10 font-bold hover:text-yellow-400 hover:text-yellow-400 hover:rotate-6 hover:mt-16 hover:text-xl text-lg p-5 border-gray-500 border-4 rounded-md shadow-md>Accommondaties">
                    <img class="h-[72px] w-[72px]" src="img/accomodaties.svg" alt="">
                    <p class="text-center font-bold text-xl">HUISJES</p>
                </button></a>
            <a href="/attractions-admin/"><button class="transition duration-700 ease-in-out flex flex-col justify-center items-center mt-24 mx-10 font-bold hover:text-yellow-400 hover:text-yellow-400 hover:rotate-6 hover:mt-16 hover:text-xl text-lg p-5 border-gray-500 border-4 rounded-md shadow-md">
                    <img class="h-[72px] w-[72px]" src="img/attraction.svg" alt="">
                    <p class="text-center font-bold text-xl">ATRACTIES</p>
                </button></a>
        </div>
    </div>
@endsection
