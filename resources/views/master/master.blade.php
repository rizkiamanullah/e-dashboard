<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title class="drop-shadow-md">{{ config('app.name', 'ExcelIguana') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    
    </head>
    <body class="m-5 bg-gradient-to-r from-blue-300 via-purple-300 to-orange-400">
        <nav class="bg-white border-gray-200 px-2 sm:px-4 py-2.5 rounded bg-transparent">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="https://excelIguana.com/" class="flex items-center">
                <img src="{{URL::to('/')}}/img/logo.png" class="mr-3 h-6 sm:h-9" width="40px" alt="Flowbite Logo">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">ExcelIguana</span>
            </a>
            </div>
        </div>
        </nav>
        <div class="font-sans text-gray-900 antialiased">
            @yield('content')
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            @yield('js')
    </body>
</html>