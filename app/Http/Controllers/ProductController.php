<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductVarian;
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
        $data = DB::table('produkvarian')
                    ->join('products', 'produkvarian.id_product', '=', 'products.id_product')
                    ->select('products.nama_produk', 'products.jenis', 'produkvarian.ukuran', 'produkvarian.harga', 'produkvarian.stok')
                    ->get();
                    
        // $products = DB::table('products')
        // ->join('produkvarian', 'produkvarian.id_product', '=', 'products.id_product')
        // ->select('products.nama-produk', 'products.jenis', 'produkvarian.ukuran', 'produkvarian.harga','produkvarian.stok')
        // ->where('products.id_product', $id_product)
        // ->get();
        // dd($data);
        // $data = Product::paginate(3);
        // $data = Product::all();
        return view('admin.isi.Product',['products'=>$data]);
    }
    
    public function shop()
    {
        $data = DB::table('produkvarian')
        ->join('products', 'produkvarian.id_product', '=', 'products.id_product')
        ->select('products.nama_produk', 'products.jenis', 'produkvarian.ukuran', 'produkvarian.harga', 'produkvarian.stok')
        ->orderBy()
        ->get();
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
            'jenis' => 'required',
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
            $product = Product::create([
                "nama_produk" => $request->nama_produk,
                "jenis" =>$request->jenis,
                "gambar" =>$pathBaru,
                "keterangan" =>$request->keterangan,
                "created_at" => now()
            ]);
            
            ProductVarian::create([
               'id_product' => $product->id_product,
               'ukuran' => 'S',
               'stok' => $request->stok_s,
               'harga' => $request->harga_s, 
            ]);

            ProductVarian::create([
                'id_product' => $product->id_product,
                'ukuran' => 'M',
                'stok' => $request->stok_m,
                'harga' => $request->harga_m, 
             ]);

             ProductVarian::create([
                'id_product' => $product->id_product,
                'ukuran' => 'L',
                'stok' => $request->stok_l,
                'harga' => $request->harga_l, 
             ]);

             ProductVarian::create([
                'id_product' => $product->id_product,
                'ukuran' => 'XL',
                'stok' => $request->stok_xl,
                'harga' => $request->harga_xl, 
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
