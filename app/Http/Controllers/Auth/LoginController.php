<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
class LoginController extends Controller
{

     public function __construct()
     {
         $this->middleware('guest',['only' => 'showLoginForm']);
     }

    public function login(Request $request)
    {
        $credentials = $this->validate(request(),[
            'email' => 'email|required|string',
            'password' => 'required|string'
        ]);
        // dd(bcrypt('secret'));
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        
        return back()
        ->withErrors(['email' => trans('auth.failed')])
        ->withInput(request(['email']));

    }


    public function showLoginForm()
    {
        return view('LoginAdmin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/admin');
    }

}
