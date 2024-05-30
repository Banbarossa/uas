<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="flex items-start bg-gray-100 sm:justify-center">

            <div class="relative w-full min-h-screen bg-white sm:max-w-md">
                <div class="flex gap-3 px-5 pt-8 pb-32 bg-red-900">
                    <a href="/" class="p-1 bg-white rounded-lg bg-opacity-70 "><img src="{{asset('assets/images/logo.png')}}" class="w-10"  alt="logo"></a>
                    <div>
                        <h3 class="text-xs leading-none text-gray-300 font-extralight">Pesantren Imam Syafi'i</h3>
                        @if (isset($title))
                        <h1 class="text-2xl font-bold leading-none tracking-wide text-gray-200">{{ $title }}</h1>
                        @endif
                    </div>
                </div>
                <div class="px-5 pt-6 mb-20 -mt-24 bg-white rounded-t-3xl">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
