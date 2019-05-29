<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Http\Response;
use Auth;
class UsuarioController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth');
    }
    public function index()
    {

    }

    public function register()
    {
        return view('Register_user');
    }

    public function signup(Request $request)
    {
        //validación de los datos del formulario
        $credentials = $this->validate(request(),[
            'name' => 'required|string|min:3|max:60',
            'email'=> 'required|email|unique:users',
            'password' => 'required|min:4|max:60',
            'password_confirmation'=>'required|same:password',
        ]);


         if ($credentials) {
            $user = new User($request->all());

            $user->remember_token = str_random(60);
            $user->password = bcrypt($user->password);
            $user->save();
            return redirect()->route('Index');
         }

        return back()
        ->withErrors(['email' => trans('auth.failed'),
        'password' => trans('auth.failed'),
        'password_confirmation' => trans('auth.failed')]);
    }
}
