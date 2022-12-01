<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                'size' => $request->size,
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
}