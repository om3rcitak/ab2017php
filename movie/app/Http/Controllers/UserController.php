<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function doLogin(Request $request)
    {
        if(auth()->attempt([
            "email" => $request->email,
            "password" => $request->password,
        ],$request->has('remember')))
            return redirect('/');
        else
            return redirect('login')->with('hata', 'E-Posta adresi veya şifre hatalı!');
    }

    public function register()
    {
        return view("user.register");
    }

    public function doRegister(Request $request)
    {
        $user = new User;
        $user->email = $request->get('email');
        $user->password = Hash::make($request->password);
        $user->name = $request->name;
        $user->save();

        return redirect('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
