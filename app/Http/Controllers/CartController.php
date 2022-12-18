<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVarian;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderDetail;
use Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('user.page.cart', compact('cartItems'));
    }

    public function addCart(Request $request)
    {                      
        \Cart::add([
            'id' => $request->product_id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'size' => $request->ukuran,
                'subtotal' => $request->quantity * $request->price,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.index');
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->product_id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.index');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->product_id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.index');
    }

    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.index');
    }

    public function shop($id)
    {
    	$barang = Barang::where('id', $id)->first();
    	return view('pesan.index', compact('barang'));
    }
    public function pesan(Request $request, $id)
    {	
    	$barang = Barang::where('id', $id)->first();
    	$tanggal = Carbon::now();

    	//validasi apakah melebihi stok
    	if($request->jumlah_pesan > $barang->stok)
    	{
    		return redirect('pesan/'.$id);
    	}
        // else if($request $barang->stok == '0')
        // {
        //     return ('stok habis');
        // }

    	//cek validasi
    	$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	//simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
    		$pesanan = new Pesanan;
	    	$pesanan->user_id = Auth::user()->id;
	    	$pesanan->tanggal = $tanggal;
	    	$pesanan->status = 0;
	    	$pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
	    	$pesanan->save();
    	}
    	

    	//simpan ke database pesanan detail
    	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new PesananDetail;
	    	$pesanan_detail->barang_id = $barang->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $barang->harga*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else 
    	{
    		$pesanan_detail = PesananDetail::where('barang_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $barang->harga*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}

    	//jumlah total
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga*$request->jumlah_pesan;
    	$pesanan->update();
    	
        Alert::success('Pesanan Sukses Masuk Keranjang', 'Success');
    	return redirect('check-out');

    }

    public function checkout()
    {
        $cartItems = \Cart::getContent();
        
        
        $order = Order::create([
            'trx_id' => "TRX".date('YmdHis'),
            'user_id' => Auth::user()->id,
            'status' => 0, 
            'total' => 0,
        ]);

        $total = 0;
        foreach($cartItems as $index => $row){
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $row->id,
                'price' => $row->price,
                'quantity' => $row->quantity,
                'total' => $row->attributes->subtotal,
            ]);

            
            $total += $row->attributes->subtotal;
            
            
        }
        foreach($cartItems as $index => $row){
            $product = Product::where('id', $row->id)->first();
            $hasil = $product->stok-$row->quantity;
            $product->update([
                    'stok' => $hasil,
            ]);
            
            
        }
        
        $order->update([
            'total' => $total,
        ]);

        

        \Cart::clear();
        return redirect()->route('history');
    }
}