<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.page.profil', compact('user'));
    }
    public function edit()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.page.update_profil', ['user'=> $user]);
    }
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required',
            'password' => 'nullable'
        ],
        [
            'required' =>':attribute wajib diisi.'
            
        ]);

        $result = Auth::user();
        
        if ($validator->fails()) {
            return redirect('/edit-profil/'.Auth::user()->id)->withErrors($validator)->withInput();
        }else{
            if(!empty($request->password)){
                $password = bcrypt($request->password);
            }else{
                $password = $result->password;
            }

            $result->update([
                "nama" => $request->nama,
                "alamat" =>$request->alamat,
                "email" =>$request->email,
                "telepon" =>$request->telepon,
                "password" =>$password,
                "updated_at" => now()
            ]);
            return redirect()->route('profile.index');
        }
    }

}