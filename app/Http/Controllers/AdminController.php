<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Psy\TabCompletion\Matcher\FunctionsMatcher;

class AdminController extends Controller
{
    public function admin(){
        return view('admin.isi.Admin');
    }
    public function dashbord(){
        return view('admin.isi.Dashbord');
    }
    public function customer(){
        return view('admin.isi.Customer');
    }
    public function product(){
        return view('admin.isi.Product');
    }
    public function inputproduct(){
        return view('admin.isi.inputproduk');
    }
    public function editproduct(){
        return view('admin.isi.edit');
    }
}
