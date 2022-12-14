<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;

class DashboardController extends Controller
{
    // public function totalPembeli()
    // {
    //     $pembeli = Order::select('user_id', DB::raw('SUM(user_id) as total'))->groupBy('user_id')->get();
    //     return view('admin\isi.Dashbord')->with($pembeli);
    //     $pembeli = Order::with(['pengeluaran' => function($query){
    //         $query->select(
    //             DB::raw('sum(jumlah) as sum'),
    //             DB::raw("Monthname(waktu) as month"))
    //         ->groupBy('month');
    //        }])
    //       ->get();
    // }
    public function totalPemesan()
    {
        $posts = Order::count();
        return view('admin\isi.Dashbord',["posts"=>$posts]);
        // dd($pemesan);
    }
}
