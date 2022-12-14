<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        return view('user.page.profil', compact('user'));
    }
    // public function edit(Request $request)
    // {   
    //     return view('user.page.update_profil', [
    //         'user' => $request->user()
    //     ]);
    // }
    // public function update(Authenticatable $request)
    // {
    //     $user = User::findOrFail(Auth::id());
    //     $user->nama = $request->get('nama');
    //     $user->alamat = $request->get('alamat');
    //     $user->email = $request->get('email');
    //     $user->telepon = $request->get('telepon');
    //     $user->password = $request->get('password');
    //     $user->save();
    //     return \Redirect::route('profile.edit', [$user->id])->with('message', 'User has been updated!');
    // }
}
