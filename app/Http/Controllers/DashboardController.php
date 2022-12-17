<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    public function __construct(){
        $this->view = 'admin.isi.Dashbord';
        $this->User = new User();
        $this->Order = new Order();
        $this->Product = new Product();
    }
    public function index(){
        $total_user = $this->User;
        $total_user = $total_user->role(User::ROLE_USER);
        $total_user = $total_user->count();

        $total_pesanan = $this->Order;
        $total_pesanan = $total_pesanan->count();

        $total_product = $this->Product;
        $total_product = $total_product->count();

        $order = DB::table('orders')
        ->join('users', 'users.id', '=', 'orders.user_id')
        ->select('users.*', 'orders.total', 'orders.status')
        ->get();

        $data = [
            'total_user' => $total_user,
            'total_pesanan' => $total_pesanan,
            'total_product' => $total_product,
            'order' => $order,
        ];
        return view($this->view,$data);
    }
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
    // public function totalPemesan()
    // {
    //     $posts = Order::count();
    //     return view('admin\isi.Dashbord',["posts"=>$posts]);
    //     // dd($pemesan);
    // }
    // public function order()
    // {
    //     $data = OrderDetail::paginate(3);
    //     // $data = Product::all();
    //     return view('admin.isi.Dashbord',['order'=>$data]);
    // }

}
