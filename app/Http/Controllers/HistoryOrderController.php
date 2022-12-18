<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;
class HistoryOrderController extends Controller
{
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
        $user = User::findOrFail(Auth::id());
    	$order = Order::findOrFail($id);
    	$order_details = OrderDetail::where('order_id', $order->id)->first();
    	$product = Product::where('id', $order_details->product_id)->first();

        
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
                'order_id' => rand(),
                'gross_amount' => $order->total,
            ),
            'customer_details' => array(
                'nama' => $user->nama,
                'email' => auth()->user()->email,
                'phone' => auth()->user()->telepon,
            ),
        );

        
        // dd($order_details);
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('user.page.historydetail',['snapToken'=>$snapToken, 'order'=>$order, 'product'=>$product,  'order_details'=>$order_details]);
        }
}