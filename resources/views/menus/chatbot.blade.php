@extends('master.master')
@section('content')
<div class="content">
    <div class="p-6 w-full rounded bg-gray-300 border-gray-700 dark:bg-gray-800 text-white">
        <div class="space-y-3 main-skeleton">
            <div class="flex animate-pulse justify-center items-center w-full h-48 bg-gray-300 rounded sm:w-96 dark:bg-gray-700">
                <svg class="w-full h-12 text-gray-200" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" fill="currentColor" viewBox="0 0 640 512"><path d="M480 80C480 35.82 515.8 0 560 0C604.2 0 640 35.82 640 80C640 124.2 604.2 160 560 160C515.8 160 480 124.2 480 80zM0 456.1C0 445.6 2.964 435.3 8.551 426.4L225.3 81.01C231.9 70.42 243.5 64 256 64C268.5 64 280.1 70.42 286.8 81.01L412.7 281.7L460.9 202.7C464.1 196.1 472.2 192 480 192C487.8 192 495 196.1 499.1 202.7L631.1 419.1C636.9 428.6 640 439.7 640 450.9C640 484.6 612.6 512 578.9 512H55.91C25.03 512 .0006 486.1 .0006 456.1L0 456.1z"/></svg>
            </div>
            <div class="p-2">
                <div class="h-2 bg-gray-200 rounded-full dark:bg-gray-700 max-w-[360px]"></div>
            </div>
        </div>
        <div class="space-y-3 main-content">
            <div id="wavy" class="rounded-md h-49 w-full bg-gradient-to-r from-blue-300 via-purple-200 to-blue-500">
                <br><br>
                <p class=" text-gray-800 font-bold mt-4 text-9xl">Chatbot BETA</p>
            </div>
            <div class="font-light p-2 text-gray-900 dark:text-white">
                <div id="chat_box" class="overflow-y-auto p-3 space-y-3 border border-white rounded h-[290px] dark:border-gray-700">
                    <div class="w-full">
                        <div class="p-3 flex justify-start rounded min-w-0 max-w-[45%] bg-blue-200">
                            <p class="text-black">Welcome to Chatbot BETA. Powered by GPT-3. <br> Write something to start the chatbot!</p>
                        </div>
                        <a href="/clear_log" class="ml-3 mt-2 text-blue-500">Clear Message</a>
                    </div>
                    @if (count($data['user_chat']) > 0)
                        @foreach ($data['user_chat'] as $uc)
                        @if ($uc->id_chatbot_log == 0)
                            <div class="w-full flex justify-end">
                                <div class="p-3 rounded min-w-0 max-w-[45%] bg-blue-500">
                                    <div class="flex justify-start">
                                        <p class="text-black">{{$uc->sent_message}}</p>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="w-full">
                                <div class="p-3 flex justify-start rounded min-w-0 max-w-[45%] bg-blue-200">
                                    <p class="text-black">{{$uc->sent_message}}</p>
                                </div>
                            </div>
                        @endif
                        @endforeach
                    @endif
                    
                </div>

                <form id="onSubmit" action="/user_sent" method="post">
                @csrf
                <div class="flex items-center mt-2">
                    <input name="input_field" type="text" placeholder="Type something" class="w-[95%] rounded bg-gray-300 border-white dark:bg-gray-800 dark:border-gray-700">
                    <button type="submit" class="bg-blue-400 p-2 rounded-lg ml-2 px-5 hover:bg-blue-200">
                        <svg class="w-6 h-6 rotate-90" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path></svg>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{-- for post csrf --}}
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script>
    // $('#input_button').click(function(){
    $('#onSubmit').submit(function(e){
        e.preventDefault();
        var $form = $(this),
        term = $form.find("input[name='input_field']").val();
        console.log(term);
        url = $form.attr("action");

        $("input[name='input_field']").val('');

        ins_html = `
        <div class="w-full flex justify-end">
            <div class="p-3 rounded min-w-0 max-w-[45%] bg-blue-500">
                <div class="flex justify-start">
                    <p class="text-black">${term}</p>
                </div>
            </div>
        </div>
        `;
        $("#chat_box").append(ins_html); //// For Append
        $("#chat_box").animate({ scrollTop: $('#chat_box').prop("scrollHeight")}, 1000);


        var posting = $.post( url, { s: term } );

        posting.done(function(data){
            $.ajax({
            type: 'GET', //THIS NEEDS TO BE GET
            url: '/bot_sent',
            data: 'json',
            success: function (data) {
                console.log(data);
                var html = "";
                $.each(data, function (key, val) {
                    console.log(val);
                    html = `
                    <div class="w-full">
                        <div class="p-3 flex justify-start rounded min-w-0 max-w-[45%] bg-blue-200">
                            <p class="text-black">${val}</p>
                        </div>
                    </div>
                    `;
                });
                $("#chat_box").append(html); //// For Append
                $("#chat_box").animate({ scrollTop: $('#chat_box').prop("scrollHeight")}, 1000);
                //  $("#mydiv").html(your_html)   //// For replace with previous one
            },
            error: function() { 
                console.log(data);
            }
        });
    });

    })
</script>
@endsection