@extends('master.master')
@section('content')
<div class="content">
    <div class="p-6 w-full h-full rounded bg-gray-300/75 dark:bg-gray-800/75 text-white">
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
                    <div class="w-full flex justify-start p-3 space-x-3 bg-gray-300 dark:bg-gray-900">
                        <div class="rounded-xl bg-blue-500 hover:bg-blue-400">
                            <a href="/add_data" class="flex justify-center p-2">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                            </a>
                        </div>
                        <div>
                            <input id="search_box" onkeyup="searchFunction()" placeholder="Search Product Name" type="text" class="rounded-lg border-0 w-[400px] px-4 text-black bg-white">
                        </div>
                    </div>
                    <table id="list_table" class="w-full rounded text-sm text-left text-gray-500 dark:text-gray-400 overflow-y-auto">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
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
                            
                        </thead>
                        <tbody id="table_body">
                            @foreach ($data['item'] as $i)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$i->name}}
                                </th>
                                <td class="py-4 px-6">
                                    {{$i->color}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$i->category}}
                                </td>
                                <td class="py-4 px-6">
                                    {{$i->price}}
                                </td>
                                <td class="py-4 px-6 text-right">
                                    <a href="/edit_data/{{$i->id}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                </td>
                            </tr>  
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    function searchFunction() {
        var input, filter, table, tbody, tr, td, i, txtValue;
        input = document.getElementById("search_box");
        filter = input.value.toUpperCase();
        table = $('#table_body');
        tr = table.find('tr');

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("th")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }
        }
    }
</script>
@endsection