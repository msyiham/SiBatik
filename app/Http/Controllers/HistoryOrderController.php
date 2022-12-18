<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Baru;
use App\Models\OrderDetail;
use Auth;
use App\Http\Controllers\json_decode;
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
                'gross_amount' => $order->total,
            ),
            'item_details' => array(
                [
                    'id'=>$order->trx_id,
                    'quantity'=> $order_details->quantity,
                    'price'=>$order_details->price,
                    'name'=>$product->nama_produk,
                ]
            ),
            'customer_details' => array(
                'first_name' => $user->nama,
                'email' => $user->email,
                'phone' => auth()->user()->telepon,
            ),
        );

        
        // dd($order_details);
        // table->string('email');
        //     $table->string('transaction_id');
        //     $table->string('order_id');
        //     $table->string('gross_amount');
        //     $table->string('payment_type');
        $snapToken = \Midtrans\Snap::getSnapToken($params);
                return view('user.page.historydetail',['snapToken'=>$snapToken, 'order'=>$order, 'product'=>$product,  'order_details'=>$order_details]);
        }
        public function detail_post(Request $request){
            //return $request;
            //store data json ke db order details
            
            $status = Order::where('user_id', $request->id_user)->first();
            $status->update([
                'status' => 1,
            ]);
            $nama = User::where('email', $request->get('email'))->first();
            
            $json =  json_decode($request->get('json'));
            
            $orders1 = new Baru();
            $orders1->status = $json->transaction_status;
            $orders1->transaction_id = $json->transaction_id;
            $orders1->order_id = $json->order_id;
            $orders1->gross_amount = $json->gross_amount;
            $orders1->payment_type = $json->payment_type;
            
            $orders1->uname = $request->get('uname');
            $orders1->email = $request->get('email');
            
            $orders1->user_id = $request->get('id_user');
            $orders1->save();
            alert()->html('Transaksi Berhasil','Terimakasih telah berbelanja pada website kami','success');
            
            
		    return redirect(url('/history'));
        }
        public function destroy($id)
        {
            $order = Order::findOrFail($id);
            $order->delete();
            return redirect()->back();
        }
}