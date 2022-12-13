<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\at;

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

    public function __construct()
    {
        
    }

    public function index(Request $req){
        return view('menus.main');
    }

    public function login(Request $req){
        return view('menus.login');
    }

    public function post_login(Request $request){
        $credentials = [
            'username' => 'required',
            'password' => 'required',
            'g-recaptcha-response' => 'recaptcha', //recaptcha validation
        ];
        $this->validate($request, $credentials);

        $credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            Session::put(['username' => Auth::user()->username]);
            return redirect()->intended('/');
        }
        Session::flash('error', 'Email/ Password not found');
        return redirect('login');
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
            'password' => Hash::make($request->input('password')),
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
