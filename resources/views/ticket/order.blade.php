@extends('layout')

<head>
    <title>Orders - Legoland Doetinchem</title>
</head>

<body>
@section('content')
    <form class="max-w-screen-xl mt-24 px-8 grid gap-8 grid-cols-1 md:grid-cols-2 md:px-12 lg:px-16 xl:px-32 py-16 mx-auto text-gray-900 rounded-lg" method="post" action="">
        @csrf

        <div class="flex flex-col justify-between">
            <div>
                <h2 class="text-4xl lg:text-5xl font-bold leading-tight">Uw tickets, makkelijk geregeld!</h2>
                <br>
                <p>Heeft u hulp nodig? <span><a href="contact" class="text-blue-400 hover:text-gray-500">neem contact op</a></span></p>

                @if (session('ordered'))
                    <div class="alert alert-success">
                        <div class=" text-center py-4 lg:px-4">
                            <div class="p-2 bg-yellow-400 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                                <span class="flex rounded-full bg-yellow-300  uppercase px-2 py-1 text-xs font-bold mr-3">!</span>
                                <span class="font-semibold mr-2 text-left flex-auto">Uw tickets zijn bestelt!</span>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <div>
            <div class="mt-8">
                <span class="uppercase text-sm text-gray-600 font-bold ">Ticket Type</span>
                <select name="ticket_type" class="w-full border-gray-800 border-2 px-5 py-2 bg-white" name="type">
                    @foreach($tickets as $e)
                        <option value="{!! $e->id !!}">{{$e->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-8 mb-5">
                <span class="uppercase text-sm text-gray-600 font-bold">Aantal</span>
                <input type="number" class="w-full border-gray-800 border-2 px-5 py-2 bg-white" name="amount1">
            </div>

            <div id="extraRows">

            </div>

            <div id="addRow" class="uppercase text-sm font-bold tracking-wide bg-yellow-500 text-gray-100 p-3 rounded-lg w-1/2 focus:outline-none focus:shadow-outline">
                voeg rij toe
            </div>

            <script>
                let currentAmount=1;


                    document.querySelector("#addRow").addEventListener("click", function () {
                        currentAmount++;
                        if(currentAmount <=5) {
                            document.getElementById("extraRows").innerHTML +=
                                `
                                    <div class="mt-8">
                                        <span class="uppercase text-sm text-gray-600 font-bold">Ticket Type${currentAmount}</span>
                                        <select name="ticket_type" class="w-full border-gray-800 border-2 px-5 py-2 bg-white" name="type${currentAmount}">
                                            @foreach($tickets as $e)
                                                <option value="{!! $e->id !!}">{{$e->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mt-8">
                                        <span class="uppercase text-sm text-gray-600 font-bold">Aantal${currentAmount}</span>
                                        <input type="number" class="w-full border-gray-800 border-2 px-5 py-2 bg-white mb-5" name="amount${currentAmount}">
                                    </div>
                                `
                        } else { alert("maximale grootte")}
                    }
                )
            </script>

            <div class="mt-8">
                <button type="submit"
                    class="uppercase text-sm font-bold tracking-wide bg-yellow-500 text-gray-100 p-3 rounded-lg w-full focus:outline-none focus:shadow-outline">
                    Bestel Tickets
                </button>
            </div>
    </form>
@endsection

</body>
