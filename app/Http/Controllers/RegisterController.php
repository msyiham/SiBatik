<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('user.login.Registrasi');
    }
    public function prosesRegis(Request $request){
    $validator = validator::make($request->all(),
        [
                'nama' => 'required|max:255',
                'email' => 'required|email|unique:data_user',
                'telepon' => 'required|min:11|max:12',
                'alamat' => 'required',
                'password' => 'required|size:6'
        ],
        [
            'required' =>':attribute wajib diisi.',
            // 'regex' =>':attribute hanya berisi huruf',
            'size' => ':attribute harus berukuran :size karakter',
            'max' => ':attribute maksimal berisi :max karakter',
            'min' => ':attribute minimal berisi :min karakter',
            'email' => ':harus diisi dengan alamat email yang valid',
            'unique' => ':attribute sudah digunakan'
        ]);
        
        if ($validator->fails()) {
            return redirect('/regis')->withErrors($validator)->withInput();
        }else {
            $hash = bcrypt($request->password);
            DB::table('data_user')->insert([
                "nama" => $request->nama,
                "email" => $request->email,
                "telepon" =>$request->telepon,
                "password" =>$hash,
                "alamat" =>$request->alamat,
                "created_at" => now()
            ]);
            return redirect('/login');
        }
    }
}
