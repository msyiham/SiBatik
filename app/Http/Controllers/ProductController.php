<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(3);
        return view('admin.isi.Product',['products'=>$products]);
    }
    
    public function shop()
    {
        $products = Product::all();
        return view('user.page.shop',['products'=>$products]);
    }
    public function buy(Product $products)
    {
        return view('user.page.buy',['products'=>$products]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.isi.inputproduk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(),
        [
            'nama_produk' => 'required',
            'stok' => 'required',
            'jenis' => 'required',
            'harga' => 'required',
            'ukuran' => 'required|in:S,M,L,XL,XXL',
            'keterangan' => 'required',
            'gambar' => 'required|file|mimes:jpg,png|max:5000'
        ],
        [
            'required' =>':attribute wajib diisi.',
            'mimes' =>':attribute harus gambar jpg/png.',
            'max' => 'ukuran :attribute terlalu besar'
            
        ]);
        if ($validator->fails()) {
            return redirect('/product/create')->withErrors($validator)->withInput();
        }else {
            $extFile = $request->gambar->getClientOriginalExtension();
            $namaFile = 'product-'.time().".".$extFile;
            $path = $request->gambar->move('image',$namaFile);
            $pathBaru = asset('image/'.$namaFile);
            Product::create([
                "nama_produk" => $request->nama_produk,
                "stok" => $request->stok,
                "jenis" =>$request->jenis,
                "harga" =>$request->harga,
                "gambar" =>$pathBaru,
                "ukuran" =>$request->ukuran,
                "keterangan" =>$request->keterangan,
                "created_at" => now()
            ]);
            return redirect()->route('products.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
