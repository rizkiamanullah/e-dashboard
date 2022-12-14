<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class settingsController extends Controller
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
    }

    public function index(Request $req){
        $data['user'] = $this->users->where('username', $req->session()->get('username'))->first();
        return view('menus.settings', compact('data'));
    }
}
