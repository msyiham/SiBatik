<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    
        public function __construct(){
            $this->view = 'admin.isi.detail-order';
            // $this->User = new User();
            // $this->OrderDetail = new OrderDetail();
        }
        public function orderDetail($id){
            $order = Order::where('user_id', $id)->first();
    	    $order_detail = OrderDetail::where('order_id', $order->id)->get();
            $user = User::where('id', $id)->first();
            // $order = DB::table('users')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            // ->leftjoin('orders', function)
            // ->select('users.*', 'orders.total', 'orders.status')
            // ->get();

            // $c = Customer::leftJoin('orders', function($join) {
            //     $join->on('customers.id', '=', 'orders.customer_id');
            //   })
            //   ->whereNull('orders.customer_id')
            //   ->first();

            //   $posts =DB::table('a')
            //     ->join('b', 'a.field5', '=', 'b.field1')
            //     ->leftJoin('c', function($join){
            //                 $join->on('a.field6', '=', 'c.field1')
            //                      ->on('c.field4', '=', 'b.field1');
            //                 })
            //     ->select('*')
            //     ->get();
            $order_detail = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('order_details.*', 'products.nama_produk', 'products.gambar')
            ->get();

            // $user =DB::table('users')
            // ->join('orders', 'users.id', '=', 'orders.user_id')
            // ->leftJoin('products', function($join){
            //             $join->on('users.id', '=', 'orders.user_id');
            //                 //  ->on('orders.user_id', '=', 'products.id');
            //             })
            // ->select('*')
            // ->get();  
    
            $data = [
                'order' => $order,
                'order_details' => $order_detail,
                // 'user' => $user,
            ];
            return view($this->view,$data);
        }
    
}
