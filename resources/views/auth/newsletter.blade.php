@extends('layout')

@section('head')
    <title>Legoland.nl - Login</title>
@endsection

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                <img class="mx-auto h-12 w-auto" src="https://www.legoland.com/media/zntlpyyz/legoland_parks_logo.svg" alt="Workflow">
                <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                    Verstuur een nieuwsbrief
                </h2>
            </div>

            <form class="mt-8 space-y-6" action="" method="POST">
                @csrf

                <input type="hidden" name="remember" value="True">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <input name="subject" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Titel">
                    </div>
                    <div>
                        <input name="message" type="text" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Bericht">                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Verstuur Bericht
                    </button>
                </div>
            </form>

            @if (session('newsletter_confirmation'))
                <div class="alert alert-success">
                    <div class=" text-center py-4 lg:px-4">
                        <div class="p-2 bg-yellow-400 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-yellow-300  uppercase px-2 py-1 text-xs font-bold mr-3">VERSTUURD</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{!! session('newsletter_confirmation') !!}</span>
                        </div>
                    </div>
                </div>
            @endif
    </div>
@endsection
