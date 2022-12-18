<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function notice(){
        alert()->html('Mohon verifikasi email terlebih dahulu');
        return redirect('/login');
    }
    public function verify(EmailVerificationRequest $request){
        $request->fulfill();
        return redirect('/login');
    }

}
