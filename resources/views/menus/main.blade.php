@extends('master.master')
@section('content')
<div class="content">
    {{-- <div role="status" class="space-y-8 animate-pulse md:space-y-0 md:space-x-8 md:flex md:items-center">
        <div class="w-full">
            <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[480px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[440px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[460px] mb-2.5"></div>
            <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
        </div>
        <span class="sr-only">Loading...</span>
    </div> --}}
    <div class="p-6 w-full rounded bg-gray-300/75 border-gray-700 dark:bg-gray-800/75 text-white">
        <div class="space-y-3 main-skeleton">
            {{-- <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-700 w-48 mb-4"></div> --}}
            <div class="flex animate-pulse justify-center items-center w-full h-48 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                <svg class="w-full h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
            </div>
            <div class="p-2">
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
            </div>
        </div>
        <div class="space-y-3 main-content">
            <div class="rounded-md h-[35] w-full bg-gradient-to-r from-blue-300 via-purple-200 to-blue-500">
                <br><br>
                <p class=" text-gray-800 font-bold mt-4 text-9xl">Home</p>
            </div>
            <div class="font-light p-2 text-gray-900 dark:text-white">
                Silahkan gunakan sidebar untuk melihat hal yang ditawarkan oleh dashboard ini.
            </div>
        </div>
        <div class="space-y-3 second-content">
            <div class="columns-2 font-light p-2 text-gray-900 dark:text-white">
                <div class="py-2">
                    <div class="rounded-md p-4 h-[35] bg-gray-300/75 hover:bg-blue-100 hover:text-black dark:bg-gray-800/75">
                        <a href="/chatbot" class="flex justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            <p class="pl-2">Chatbot</p>
                        </a>
                    </div>
                </div>
                <div class="py-2">
                    <div class="rounded-md p-4 h-[35] bg-gray-300/75 hover:bg-blue-100 hover:text-black dark:bg-gray-800/75">
                        <a href="/tables" class="flex justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            <p class="pl-2">Tables</p>
                        </a>
                    </div>
                </div>
                <div class="py-2">
                    <div class="rounded-md p-4 h-[35] bg-gray-300/75 hover:bg-blue-100 hover:text-black dark:bg-gray-800/75">
                        <a href="/chatbot" class="flex justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path></svg>
                            <p class="pl-2">Chatbot</p>
                        </a>
                    </div>
                </div>
                <div class="py-2">
                    <div class="rounded-md p-4 h-[35] bg-gray-300/75 hover:bg-blue-100 hover:text-black dark:bg-gray-800/75">
                        <a href="/tables" class="flex justify-center">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M3 14h18m-9-4v8m-7 0h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
                            <p class="pl-2">Tables</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection