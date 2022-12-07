<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(3);
        return view('admin\isi.Customer',['customers'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('user.login.Registrasi');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator::make($request->all(),
        [
                'nama' => 'required|max:255',
                'email' => 'required|email|unique:users',
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
            return redirect('/customers/regis')->withErrors($validator)->withInput();
        }else {
            $hash = bcrypt($request->password);
            $user = User::create([
                "nama" => $request->nama,
                "email" => $request->email,
                "telepon" =>$request->telepon,
                "password" =>$hash,
                "alamat" =>$request->alamat,
                // "status" => $request->status,
                "created_at" => now()
            ]);

            // $user->assignRole(User::ROLE_USER);
            return redirect('/login');
            // return dd($user);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $customer)
    {
        //
    }
}
