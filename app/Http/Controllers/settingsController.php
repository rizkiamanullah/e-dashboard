<?php

namespace App\Http\Controllers;

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
        if ($req->session()->has('username')) {
            $data['user'] = $this->users->where('name', $req->session()->get('name'))->first()->getOriginal();
            // dd($data);
            return view('menus.settings', compact('data'));
        } else {
            return redirect('login');
        }
    }
}
