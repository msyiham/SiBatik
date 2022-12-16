<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
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
    	$order = Order::where('id', $id)->first();
    	$order_details = OrderDetail::where('order_id', $order->id)->get();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = 'Mid-server-5cFjqExXW_Odq-JNcUdE9kA5';
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => 10000,
            ),
            'customer_details' => array(
                'first_name' => 'budi',
                'last_name' => 'pratama',
                'email' => 'budi.pra@example.com',
                'phone' => '08111222333',
            ),
        );
        
        $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('user.page.historydetail',['snapToken'=>$snapToken, 'order'=>$order, 'order_details'=>$order_details]);
    }
}
