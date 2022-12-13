<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title class="drop-shadow-md">{{ config('app.name', 'e-Dashboard') }}</title>

        <!--logo-->
        <link rel="icon" href="{{ url('img/logo.png') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

        <!-- ReCaptcha js -->
        {!! htmlScriptTagJsApi() !!}

        <!-- Darkmode -->
        <script>
        // It's best to inline this in `head` to avoid FOUC (flash of unstyled content) when changing pages or themes
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
            window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        </script>
    
    </head>
    <style>
        body{
            margin: 0;
            padding: 0;
            background-color: #0e6cc4;
            overflow-x:hidden;
            overflow-y:hidden;
        }

        #wavy{
            margin: 0;
            padding: 0;
            background-color: #0e6cc4;
            overflow-x:hidden;
            overflow-y:hidden;
        }

        /* Hide scrollbar for Chrome, Safari and Opera */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        /* Hide scrollbar for IE, Edge and Firefox */
        .no-scrollbar {
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
        }

        /*waves****************************/


        .box {
            position: fixed;
            top: 0;
            transform: rotate(80deg);
            left: 0;
        }

        .wave {
            position: fixed;
            top: 0;
            left: 0;
            opacity: .4;
            position: absolute;
            top: 3%;
            left: 10%;
            background: #0af;
            width: 1500px;
            height: 1300px;
            margin-left: -150px;
            margin-top: -250px;
            transform-origin: 50% 48%;
            border-radius: 43%;
            animation: drift 7000ms infinite linear;
        }

        .wave.-three {
            animation: drift 7500ms infinite linear;
            position: fixed;
            background-color: #77daff;
        }

        .wave.-two {
            animation: drift 3000ms infinite linear;
            opacity: .1;
            background: black;
            position: fixed;
        }

        .box:after {
        content: '';
        display: block;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: -11;
        transform: translate3d(0, 0, 0);
        }

        @keyframes drift {
        from { transform: rotate(0deg); }
        from { transform: rotate(360deg); }
        }

        /*LOADING SPACE*/

        .contain {
            animation-delay: 4s;
            z-index: 1000;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;

            background: #25a7d7;
            background: -webkit-linear-gradient(#25a7d7, #2962FF);
            background: linear-gradient(#25a7d7, #25a7d7);
        }

        .icon {
        width: 100px;
        height: 100px;
        margin: 0 5px;
        }

        /*Animation*/
        .icon:nth-child(2) img {-webkit-animation-delay: 0.2s;animation-delay: 0.2s}
        .icon:nth-child(3) img {-webkit-animation-delay: 0.3s;animation-delay: 0.3s}
        .icon:nth-child(4) img {-webkit-animation-delay: 0.4s;animation-delay: 0.4s}

        .icon img {
        -webkit-animation: anim 2s ease infinite;
        animation: anim 2s ease infinite;
        -webkit-transform: scale(0,0) rotateZ(180deg);
        transform: scale(0,0) rotateZ(180deg);
        }

        @-webkit-keyframes anim{
        0% {
            -webkit-transform: scale(0,0) rotateZ(-90deg);
            transform: scale(0,0) rotateZ(-90deg);opacity:0
        }
        30% {
            -webkit-transform: scale(1,1) rotateZ(0deg);
            transform: scale(1,1) rotateZ(0deg);opacity:1
        }
        50% {
            -webkit-transform: scale(1,1) rotateZ(0deg);
            transform: scale(1,1) rotateZ(0deg);opacity:1
        }
        80% {
            -webkit-transform: scale(0,0) rotateZ(90deg);
            transform: scale(0,0) rotateZ(90deg);opacity:0
        }
        }

        @keyframes anim{
        0% {
            -webkit-transform: scale(0,0) rotateZ(-90deg);
            transform: scale(0,0) rotateZ(-90deg);opacity:0
        }
        30% {
            -webkit-transform: scale(1,1) rotateZ(0deg);transform: scale(1,1) rotateZ(0deg);opacity:1
        }
        50% {
            -webkit-transform: scale(1,1) rotateZ(0deg);
            transform: scale(1,1) rotateZ(0deg);opacity:1
        }
        80% {
            -webkit-transform: scale(0,0) rotateZ(90deg);
            transform: scale(0,0) rotateZ(90deg);opacity:0
        }
        }
    </style>
    @if (Session::has('username'))
    <body class="m-5 bg-white dark:bg-gray-900">
    @else
    <body class="m-5">
        <div class='box'>
            <div class='wave -one'></div>
            <div class='wave -two'></div>
            <div class='wave -three'></div>
        </div>
    @endif
        <nav class="bg-slate-400 border-gray-200 px-2 sm:px-4 py-2.5 rounded bg-transparent">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            @if (Session::has('username'))
                <a href="https://e-dashboard.com/" class="flex items-center">
                    <img src="{{URL::to('/')}}/img/logo_long_light.png" class="mr-3 h-6 sm:h-9" width="100%" alt="Flowbite Logo">
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-2 pt-3 mt-5 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                    <a href="settings" class="block py-2 pr-4 pl-3 pt-5 text-gray-700 rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Settings</a>
                    </li>
                    <li>
                    <a href="logout" class="block py-2 pr-4 pl-3 pt-5 text-gray-700 rounded hover:bg-blue-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Logout</a>
                    </li>
                    <li>
                        <!-- Dark mode switcher -->
                            <button
                        id="theme-toggle"
                        type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-blue-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5"
                        >
                        <svg
                            id="theme-toggle-dark-icon"
                            class="w-5 h-5 hidden"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                            ></path>
                        </svg>
                        <svg
                            id="theme-toggle-light-icon"
                            class="w-5 h-5 hidden"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            ></path>
                        </svg>
                        </button>
                        <!-- Dark mode switcher end -->
                    </li>
                </ul>
                @else
                <a href="https://e-dashboard.com/" class="flex items-center" style="z-index: 20">
                    <img src="{{URL::to('/')}}/img/logo.png" class="mr-3 h-6 sm:h-9" width="100%" alt="Flowbite Logo">
                    {{-- <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">E-Dashboard</span> --}}
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="flex flex-col p-2 pt-3 mt-5 bg-gray-50 rounded-lg border border-gray-100 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <!-- Dark mode switcher -->
                            <button
                        id="theme-toggle"
                        type="button"
                        class="text-gray-500 dark:text-gray-400 hover:bg-blue-200 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm"
                        >
                        <svg
                            id="theme-toggle-dark-icon"
                            class="w-5 h-5 hidden"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                            d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"
                            ></path>
                        </svg>
                        <svg
                            id="theme-toggle-light-icon"
                            class="w-5 h-5 hidden"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd"
                            clip-rule="evenodd"
                            ></path>
                        </svg>
                        </button>
                        <!-- Dark mode switcher end -->
                    </li>
                </ul>
            @endif
            </div>
        </div>
        </nav>
        <div class="flex px-6 py-3 font-sans text-gray-900 antialiased h-screen">
            <div class="">
                @if (Session::has('username'))
                <div class="main-content">
                    <aside class="w-64" aria-label="Sidebar">
                    <div class="overflow-y-auto py-4 px-3 bg-gray-300 rounded dark:bg-gray-800">
                        <ul class="space-y-2">
                            <li>
                                <a href="/" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="w-6 h-6 text-gray-500 transition 7uration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                                <span class="ml-3">Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="/chatbot" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path></svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Chatbot (OpenAI)</span>
                                <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">WIP</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                                <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                                </a>
                            </li>
                            <li>
                                <a href="/tables" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Tables</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg dark:text-white hover:bg-blue-100 dark:hover:bg-gray-700">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
                                <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal text-gray-700 rounded-lg transition duration-75 hover:bg-blue-100 dark:hover:bg-gray-700 dark:text-white group">
                                <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-700 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
                                <span class="ml-3">Help</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    </aside>
                </div>
                <div class="main-skeleton">
                    <aside class="w-64" aria-label="Sidebar">
                    <div class="overflow-y-auto py-4 px-3 bg-gray-50 rounded dark:bg-gray-800">
                        <ul class="space-y-9 p-3">
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
    
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
    
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
    
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
    
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
    
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                            </li>
                        </ul>
                        <ul class="pt-4 space-y-9 p-3 mt-4 border-t border-gray-200 dark:border-gray-700">
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                            </li>
                            <li>
                                <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
                            </li>
                        </ul>
                    </div>
                    </aside>
                </div>
                @endif
            </div>

            
            <div class="w-full max-h-[85%] px-9 overflow-y-auto" style="z-index: 20;">
                @yield('content')
            </div>


        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script>
            $('.main-content').hide();
            $(document).ready(function(){
                setTimeout(() => {
                    $('.main-skeleton').html('');
                    $('.main-content').show();
                }, 1000);
            })
        </script>
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>
        <script>
            // Darkmode
            var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
            var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

            // Change the icons inside the button based on previous settings
            if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                themeToggleLightIcon.classList.remove('hidden');
            } else {
                themeToggleDarkIcon.classList.remove('hidden');
            }

            var themeToggleBtn = document.getElementById('theme-toggle');

            themeToggleBtn.addEventListener('click', function() {

                // toggle icons inside button
                themeToggleDarkIcon.classList.toggle('hidden');
                themeToggleLightIcon.classList.toggle('hidden');

                // if set via local storage previously
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }

                // if NOT set via local storage previously
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
                
            });
        </script>
            @yield('js')
    </body>
</html>