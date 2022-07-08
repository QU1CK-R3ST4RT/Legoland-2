

<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
</head>

<body>
    <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-yellow-500">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="/" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Legoland Doetinchem</span>
            </a>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                    <li>
                        <a href="/" class="block py-2 pr-4 pl-3 text-white">Home</a>
                    </li>
{{--                        <li>--}}
{{--                            <a href="/bestellen" class="block py-2 pr-4 pl-3 text-white">Tickets Bestellen</a>--}}
{{--                        </li>--}}
                        <li>
                            <a href="/contact" class="block py-2 pr-4 pl-3 text-white">Contact</a>
                        </li>
                        <li>
                            <a href="/attracties" class="block py-2 pr-4 pl-3 text-white">Attracties</a>
                        </li>

                        <li>
                            <a href="/accommodatie" class="block py-2 pr-4 pl-3 text-white">Accommondatie</a>
                        </li>

                    @if(Auth::user())
                        @if(count(\App\Models\Newsletter::all()->where('user_id', Auth::user()->id)) > 0)
                            <li>
                                <a href="/nieuwsbrief" class="block py-2 pr-4 pl-3 text-white">Meld af van Nieuwsbrief</a>
                            </li>
                        @else
                            <li>
                                <a href="/nieuwsbrief" class="block py-2 pr-4 pl-3 text-white">Abonneer op Nieuwsbrief</a>
                            </li>
                        @endif
                    @endif

                    @if(Auth::user())
                        @if (Auth::user()->role_id >= 2)
                            <li>
                                <a href="/admin" class="block py-2 pr-4 pl-3 text-white">Admin</a>
                            </li>
                        @endif
                    @endif

                    @if (Auth::user())
                        <li>
                            <a href="logout" class="block py-2 pr-4 pl-3 text-white">Log Uit</a>
                        </li>
                    @else
                        <li>
                            <a href="login" class="block py-2 pr-4 pl-3 text-white">Log In</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto">
        @yield("content")
    </div>

    <footer>
        <p class="text-center text-gray-300">Copyright 2022 Legoland Doetinchem</p>
    </footer>
</body>

</html>
