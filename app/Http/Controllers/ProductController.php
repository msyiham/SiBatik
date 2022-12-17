<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\ProductVarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->view = 'user.page.shop';
        $this->Product = new Product();
    } 
    public function index()
    {
        $data = Product::paginate(3);
        // $data = Product::all();
        return view('admin.isi.Product',['products'=>$data]);
    }
    
    public function shop()
    {   $products = $this->Product;
        $products = $products->paginate(4);

        $recent_product = $this->Product;
        $recent_product = $recent_product->orderBy('created_at', 'desc')->take(3)->get();

        
        $data = [
            'products' => $products,
            'recent_product' => $recent_product,
        ];
        return view($this->view,$data);
        // $products = Product::all();
        // return view('user.page.shop',['products'=>$products]);
    }
    // public function cari(Request $request)
	// {
	// 	// menangkap data pencarian
	// 	$cari = $request->cari;
 
    // 		// mengambil data dari table pegawai sesuai pencarian data
	// 	$products = DB::table('products')
	// 	->where('nama_produk','like',"%".$cari."%")
	// 	->paginate();
 
    // 		// mengirim data product$product ke view index
	// 	return view('user.page.shop',['products' => $products]);

	// }
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
            'harga' => 'required',
            'ukuran' => 'required',
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
                "stok" =>$request->stok,
                "harga" =>$request->harga,
                "ukuran" =>$request->ukuran,
                "gambar" =>$pathBaru,
                "keterangan" =>$request->keterangan,
                "created_at" => now()
            ]);
            Alert::success('Yeay','Produk berhasil ditambahkan.');
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
    public function edit($id_product)
    {
        $product = Product::where('id',$id_product)->first();
        return view('admin.isi.updateproduk',['selected'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id_product)
    {
        $validator = Validator::make($request->all(),
        [
            'nama_produk' => 'required',
            'stok' => 'required',
            'harga' => 'required',
            'ukuran' => 'required',
            'keterangan' => 'required',
            'gambar' => 'nullable|file|mimes:jpg,png|max:5000'
        ],
        [
            'required' =>':attribute wajib diisi.',
            'mimes' =>':attribute harus gambar jpg/png.',
            'max' => 'ukuran :attribute terlalu besar'
            
        ]);
        if ($validator->fails()) {
            return redirect('/product/create')->withErrors($validator)->withInput();
        }else{
            $result = Product::where('id',$id_product)->first();

            if(!empty($request->gambar)){
                $product = Product::where('id', $request->id);
                $extFile = $request->gambar->getClientOriginalExtension();
                $namaFile = 'product-'.time().".".$extFile;
                $path = $request->gambar->move('image',$namaFile);
                $pathBaru = asset('image/'.$namaFile);
            }else{
                $pathBaru = $result->gambar;
            }

            $result->update([
                "nama_produk" => $request->nama_produk,
                "stok" =>$request->stok,
                "harga" =>$request->harga,
                "ukuran" =>$request->ukuran,
                "gambar" =>$pathBaru,
                "keterangan" =>$request->keterangan,
                "created_at" => now()
            ]);
            Alert::success('Yeay','Produk berhasil diperbarui.');
            return redirect()->route('products.index');
        // $product = Product::where('id_prdouct', $request->id_product);
        // $extFile = $request->gambar->getClientOriginalExtension();
        // $namaFile = 'product-'.time().".".$extFile;
        // $path = $request->gambar->move('image',$namaFile);
        // $pathBaru = asset('image/'.$namaFile);
        // $product = Product::update([
        //     "nama_produk" => $request->nama_produk,
        //     "stok" =>$request->stok,
        //     "harga" =>$request->harga,
        //     "ukuran" =>$request->ukuran,
        //     "gambar" =>$pathBaru,
        //     "keterangan" =>$request->keterangan,
        // ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_product)
    {
        $items = Product::where('id',$id_product)->first();
        $items->delete();
        Alert::success('Yeay','Produk berhasil dihapus.');
        return redirect()->back();
    }
}
