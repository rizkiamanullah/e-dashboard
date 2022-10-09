<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
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

    public function index(){
        return view('menus.main');
    }

    public function login(Request $request){
        if ($request->session()->has('user')){
            return view('menus.main');
        }
        return view('menus.login');
    }

    public function post_login(Request $request){
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha', //recaptcha validation
        ]);
        $user = User::where(['email' => $request->email,])->first();
        if ($user){
            $user = User::where(['email' => $request->email, 'password' => $request->password])->first();
            if ($user){
                $user_data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'username' => $user->username,
                    'logged' => 1,
                ];
                Session::flash('success', 'Account found');
                Session::put($user_data);
                // dd(Session::all());
                return redirect('/');
            } else {
                Session::flash('error', 'Wrong Password');
                // dd(Session::all());
                return redirect('login');
            }
        } else {
            Session::flash('error', 'Email/ Password not found');
            return redirect('login');
        }
    }

    public function signup()
    {
        return view('menus.signup');
    }

    public function created_data_email(){
        $data = [
            'created_at' => date('Y-m-d H:i:s'),
        ];
        return $data;
    }

    public function post_signup(Request $request){
        $filename = '';
        if ($request->file('photo')){
            $file = $request->file('photo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/img'),$filename);
        }
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'photo' => $filename,
        ];
        $data = $data + $this->created_data_email();
        DB::table('users')->insert($data);
        Session::flash('success', 'Account created successfuly');
        return redirect('login');
    }

    public function logout(){
        Session::flush();
        return redirect('login');
    }
}
