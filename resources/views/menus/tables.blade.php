@extends('master.master')
@section('content')
<div class="content">
    <div class="p-6 w-full h-full rounded bg-gray-300 dark:bg-gray-800 text-white">
        <div class="space-y-3 main-skeleton">
            <div class="flex justify-between text-white divide-x">
                <div class="overflow-y-auto w-full shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-y-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                                <td class="py-4 px-6">
                                    <div class="h-2.5 bg-gray-200 rounded-full dark:bg-gray-500 w-48 mb-4"></div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="flex justify-between text-white divide-x">
                <div class="overflow-auto w-full mb-2 shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 overflow-y-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="py-3 px-6">
                                    Product name
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Color
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Category
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    Price
                                </th>
                                <th scope="col" class="py-3 px-6">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @for ($i = 0; $i < 20; $i++)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    Apple MacBook Pro 17"
                                </th>
                                <td class="py-4 px-6">
                                    Sliver
                                </td>
                                <td class="py-4 px-6">
                                    Laptop
                                </td>
                                <td class="py-4 px-6">
                                    $2999
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection