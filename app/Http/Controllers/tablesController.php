<?php

namespace App\Http\Controllers;

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
    }

    public function index(Request $req){
        $data['user'] = $this->users->where('username', $req->session()->get('username'))->first();
        return view('menus.tables', compact('data'));
    }
}
