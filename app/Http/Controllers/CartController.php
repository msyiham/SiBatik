<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductVarian;

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
        $productVarian = ProductVarian::where('id_product',$request->product_id)
                                        ->where('ukuran',$request->size)
                                        ->first();


        if(!$productVarian){
            return redirect('/buy/'.$request->product_id);
        }
                            
        \Cart::add([
            'id' => $request->product_id,
            'name' => $request->name,
            'price' => $productVarian->harga,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
                'size' => $request->ukuran,
                'subtotal' => $request->quantity * $productVarian->harga,
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
}