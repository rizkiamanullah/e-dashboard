@extends('master.master')
@section('content')
<div class="content">
    <div class="p-6 w-full rounded bg-gray-300/75 border-gray-700 dark:bg-gray-800/75 text-white">
        <div class="space-y-3 main-skeleton">
        </div>
        <div class="space-y-3 main-content text-black dark:text-white">
            @if ($data['mode'] == 'add')
                <form action="/store_data" method="POST">
            @else
                <form action="/update_data/{{$data['item']->id}}" method="POST">
            @endif
                @csrf
                <div class="space-y-3">
                    <div class="flex justify-between py-2">
                        <div>
                            <div class="rounded-full w-[40px] bg-blue-500 hover:bg-blue-400">
                                <a href="/tables" class="flex justify-center p-2">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path></svg>
                                </a>
                            </div>
                        </div>
                        <div class="flex justify-between space-x-2">
                            <div class="rounded-full bg-red-500 hover:bg-red-400">
                                <a href="{{ route('item.destroy', ['id' => $data['item']->id]) }}" class="flex justify-center p-2">
                                        &nbsp;Delete&nbsp;
                                    </a>
                                </div>
                                <div class="rounded-full bg-blue-500 hover:bg-blue-400">
                                    <button type="submit" class="flex justify-center p-2">
                                        &nbsp;Save&nbsp;
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full">
                        <label for="">Product Name</label>
                        <input value="{{$data['item']->name}}" placeholder="ex: Apple iPhone 11" name="name" type="text" class="rounded w-full bg-white-300 border-0 dark:bg-gray-700 border-bg-grey">
                    </div>
                    <div class="w-full">
                        <label for="">Category</label>
                        <select name="category" class="rounded w-full bg-white-300 border-0 dark:bg-gray-700 border-bg-grey">
                            <option value="Smartphone">Smartphone</option>
                            <option value="Laptop">Laptop</option>
                            <option value="PC">PC</option>
                            <option value="Smartwatch">Smartwatch</option>
                            <option value="TV">TV</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="">Color</label>
                        <select name="color" class="rounded w-full bg-white-300 border-0 dark:bg-gray-700 border-bg-grey">
                            <option {{($data['item']->color == 'Silver') ? 'selected' : ''}} value="Silver">Silver</option>
                            <option {{($data['item']->color == 'Black') ? 'selected' : ''}} value="Black">Black</option>
                            <option {{($data['item']->color == 'Rose') ? 'selected' : ''}} value="Rose">Rose</option>
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="">Price</label>
                        <input value="{{$data['item']->price}}" id="rupiah" name="price" placeholder="Rp. " type="text" class="rounded w-full bg-white-300 border-0 dark:bg-gray-700 border-bg-grey">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
		
		var rupiah = document.getElementById('rupiah');
		rupiah.addEventListener('keyup', function(e){
			rupiah.value = formatRupiah(this.value, 'Rp. ');
		});
 
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiah     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
 
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}
 
			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>
@endsection