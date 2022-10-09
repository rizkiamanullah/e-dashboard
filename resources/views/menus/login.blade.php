@extends('master.master')
@section('content')
<div class="content">
    <div class="flex justify-center">
        <div class="p-4 w-full max-w-sm bg-white rounded-lg border border-gray-200 shadow-md sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="post_login" method="post">
                @csrf
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in</h5>
                @if (Session::has('success'))
                <div class="alert px-3 py-2 w-full flex justify-between rounded border-green-800 bg-green-500 font-thin">
                    <strong class=" text-black"> {{ Session::get('success')}} </strong>
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                </div>
                @endif
                @if (Session::has('error'))
                <div class="px-3 py-2 w-full flex justify-between rounded border-red-800 bg-red-500 font-thin">
                    <strong class=" text-black"> {{ Session::get('error')}} </strong>
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                </div>
                @endif
                @if($errors->has('g-recaptcha-response'))
                <div class="px-3 py-2 w-full flex justify-between rounded border-red-800 bg-red-500 font-thin">
                    <small class="text-danger">{{ $errors->first('g-recaptcha-response') }}</small>
                    <button type="button" class="close" data-dismiss="alert">×</button>	
                </div>
                @endif
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your email</label>
                    <input type="email" value="{{old('email')}}" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required="">
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required="">
                </div>
                {!! htmlFormSnippet() !!}
                {{-- <div class="flex items-start">
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                            <input id="remember" checked type="checkbox" value="" class="w-4 h-4 bg-gray-50 rounded border border-gray-300 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required="">
                        </div>
                        <label for="remember" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Remember me</label>
                    </div>
                    <a href="#" class="ml-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Lost Password?</a>
                </div> --}}
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="create_account" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                </div>
            </form>
        </div>
    </div>    
</div>
@endsection
@section('js')
<script>
    $('.close').click(function(){
        let container = $(this).parent();
        container.hide();
    })
</script>
@endsection