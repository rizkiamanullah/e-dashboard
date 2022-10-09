@extends('master.master')
@section('content')
<div class="content">
    <div class="p-6 w-full border rounded border-gray-700 bg-gray-800 text-white">
        <div class=" space-y-3">
            <h1 class=" font-bold">Selamat Datang di E-Dashboard</h1>
            <div class="rounded-md bg-gradient-to-r from-blue-300 via-purple-300 to-orange-400">
            @for ($i = 0; $i <= 10; $i++)
                <br>
            @endfor
            </div>
            <div class=" font-light">
                Silahkan gunakan sidebar untuk melihat hal yang ditawarkan oleh dashboard ini.
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@endsection