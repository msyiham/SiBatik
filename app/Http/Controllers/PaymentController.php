<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function bayar(){


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
                    'nama' => auth()->user()-nama,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->telepon,
                ),
            );
            
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            return view('user.page.historydetail',['snapToken'=>$snapToken]);
    }
}