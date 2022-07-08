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
                    Log in op uw account.
                </h2>
                <p class="mt-2 text-center text-sm text-gray-600">
                    Of
                    <a href="../registreer" class="font-medium text-grey-900 hover:text-gray-500">
                        Maak een nieuw account aan
                    </a>
                </p>
            </div>

            <form class="mt-8 space-y-6" action="" method="POST">
                @csrf

                <input type="hidden" name="remember" value="True">
                <div class="rounded-md shadow-sm -space-y-px">
                    <div>
                        <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                    </div>
                    <div>
                        <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Wachtwoord">
                    </div>
                </div>

                <div>
                    <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-yellow-400 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
						<span class="absolute left-0 inset-y-0 flex items-center pl-3">
							<svg class="h-5 w-5 text-white group-hover:text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="True">
								<path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
							</svg>
						</span>
                        Log In
                    </button>
                </div>
            </form>

            @if (session('message'))
                <div class="alert alert-success">
                    <div class=" text-center py-4 lg:px-4">
                        <div class="p-2 bg-yellow-400 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-yellow-300  uppercase px-2 py-1 text-xs font-bold mr-3">!</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{!! session('message') !!}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('login_success'))
                <div class="alert alert-success">
                    <div class=" text-center py-4 lg:px-4">
                        <div class="p-2 bg-yellow-400 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-yellow-300  uppercase px-2 py-1 text-xs font-bold mr-3">!</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{!! session('login_success') !!}</span>
                        </div>
                    </div>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">
                    <div class=" text-center py-4 lg:px-4">
                        <div class="p-2 bg-yellow-800 items-center text-white-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                            <span class="flex rounded-full bg-yellow-600  uppercase px-2 py-1 text-xs font-bold mr-3">!</span>
                            <span class="font-semibold mr-2 text-left flex-auto">{!! session('error') !!}</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
