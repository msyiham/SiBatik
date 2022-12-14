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
     	return view('user.page.historydetail', compact('order','order_details'));
    }
}
