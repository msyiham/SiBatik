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
<<<<<<< HEAD
=======
    public function back()
    {
    	return redirect()->back();
    }
>>>>>>> 05f9d31dfa95f27b5afd6b61d7c72208c5da4a13
    public function detail($id)
    {
    	$order = Order::where('id', $id)->first();
    	$order_details = OrderDetail::where('order_id', $order->id)->get();
     	return view('user.page.historydetail', compact('order','order_details'));
    }
<<<<<<< HEAD
=======

>>>>>>> 05f9d31dfa95f27b5afd6b61d7c72208c5da4a13
}
