<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\User;
use Auth;
// use App\Veritrans\Veritrans;
use Illuminate\Support\Facades\DB;
class HistoryOrderController extends Controller
{
    public function __construct(){
        $this->view = 'user.page.historydetail';
        // Veritrans::$serverKey = 'Mid-server-VJEXjzd_4rSvtNo6HFFr6prJ';
        // Veritrans::$isProduction = false;
        // $this->User = new User();
        // $this->OrderDetail = new OrderDetail();
    }
    public function index()
    {
    	$orders = Order::where('user_id', Auth::user()->id)->get();
    	return view('user.page.history', compact('orders'));
    }

    // public function back()
    // {
    // 	return redirect()->back();
    // }

    public function detail($id)
    {
<<<<<<< HEAD
        $user = User::findOrFail(Auth::id());
=======
        $user = User::where('id',$id)->first();
>>>>>>> refs/remotes/origin/main
    	$order = Order::where('id', $id)->first();
    	$order_details = OrderDetail::where('order_id', $order->id)->get();

        $order_details = DB::table('products')
            ->join('order_details', 'products.id', '=', 'order_details.product_id')
            ->select('order_details.*', 'products.nama_produk', 'products.gambar')
            ->get();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-VJEXjzd_4rSvtNo6HFFr6prJ';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
<<<<<<< HEAD
                'user_id' => $user->id,
                'total' => $order->total,
            ),
            'customer_details' => array(
                'nama' => $user->nama,
                'email' => $user->email,
                'telepon' => $user->telepon,
=======
                'user_id' => $order,
                'total' => $order,
            ),
            'customer_details' => array(
                'nama' => $user,
                'email' => $user,
                'telepon' => $user,
>>>>>>> refs/remotes/origin/main
            ),
        );
        

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        
        $data = [
            'order' => $order,
            'order_details' => $order_details,
            'snapToken'=>$snapToken,
        ];
        return view($this->view,$data);
        return view('user.page.historydetail',['snapToken'=>$snapToken, 'order'=>$order, 'order_details'=>$order_details]);
    }
}
