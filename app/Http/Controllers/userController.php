<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    //

    public function __construct()
    {
        $this->users = new User();
    }

    public function index(){
        return view('menus/login');
    }

}
