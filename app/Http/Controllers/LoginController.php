<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        return view ('user.login.Login');
    }
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            if(!Auth::user()->hasRole([
                User::ROLE_USER,
            ])){
                Auth::logout();
                $request->session()->flash('error', 'Anda tidak diperbolehkan mengakses menu ini');
                return redirect("/login");
            }
            return redirect()->intended('home');
        }
        else{
            $request->session()->flash('error', 'Data tidak ditemukan!');
            return redirect("/login");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
