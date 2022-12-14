<?php

namespace App\Http\Controllers;

use App\Models\ItemLog;
use App\Models\UserLog;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class tablesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
    }

    public function __construct()
    {
        $this->users = new User();
        $this->user_chat = new UserLog();
        $this->item_log = new ItemLog();
    }

    public function index(Request $req){
        $data['item'] = $this->item_log->all();
        return view('menus.tables', compact('data'));
    }
    
    public function add_data(Request $r){
        $data['mode'] = 'add';
        return view('menus.create');
    }
    
    public function edit_data(Request $r, $id){
        $data['mode'] = 'edit';
        $data['item'] = $this->item_log->where(['id' => $id])->first();
        return view('menus.create', compact('data'));
    }

    public function store_data(Request $r){
        $data = [
            'name' => $r->name,
            'price' => $r->price,
            'color' => $r->color,
            'category' => $r->category,
        ];
        if (ItemLog::create($data)){
            return redirect('/tables');
        }
        dd($_POST);
    }

    public function update_data(Request $r, $id){
        $data = [
            'name' => $r->name,
            'price' => $r->price,
            'color' => $r->color,
            'category' => $r->category,
        ];
        if (ItemLog::find($id)->update($data)){
            return redirect('/tables');
        }
        dd($_POST);
    }

    public function destroy_item($id){
        if (ItemLog::find($id)->delete($id)){
            return redirect('/tables')->with(['success' => 'Data Berhasil Dihapus!']);;
        }
        dd($_POST);
    }
}
