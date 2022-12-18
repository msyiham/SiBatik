<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

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
                User::ROLE_ADMIN,
            ])){
                Auth::logout();
                // $request->session()->flash('error', 'Anda tidak diperbolehkan mengakses menu ini');
                return redirect("/login");
                Alert::error('Warning!', 'Anda tidak diperbolehkan mengakses menu ini.');
            }
            
            if(Auth::user()->hasRole([
                User::ROLE_ADMIN,
            ])){
                Alert::success('Yeay', 'Selamat datang admin.');
                return redirect('/admin');
            }
            else{
                Alert::success('Yeay', 'Anda berhasil login.');
                return redirect()->intended('home');
            }
        }
        else{
            // $request->session()->flash('error', 'Data tidak ditemukan!');
            Alert::error('Warning!', 'Anda gagl login.');
            return redirect("/login");
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect("/login");
    }
}
