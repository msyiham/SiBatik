@extends('user.page.induk')
@section('title','Sibatik-Toko')
@section('content')

<body style=" background-color: #222831;">
  <h2 class="text-white text-center">Recent Product</h2>
  <div class="row justify-content-center mt-2 mb-3">
    
    @forelse ($recent_product as $item)
    <div class="col-md-3 mb-5">
      <div class="card h-100">
          <img class="card-img-top" src="{{ $item->gambar }}" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
              <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{ $item->nama_produk }}</h5>
                  <!-- Product reviews-->
                  <div class="d-flex justify-content-center small text-warning mb-2">
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                  </div>
                  <!-- Product price-->
                  Rp. {{ number_format($item->harga)  }}
              </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ url('/buy',['products' => $item->id_product]) }}">Beli</a></div>
          </div>
      </div>
    </div>
    @empty
    <div class="alert alert-info text-center" role="alert">
      Data tidak tersedia
    </div>
    @endforelse
    <br>
  
  </div>

  <h2 class="text-white text-center">All Product</h2>
  {{-- <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{ url('shop/cari') }}">
    <div class="input-group">
        <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" value="{{ old('search') }}"/>
        <button class="btn btn-primary" id="btnNavbarSearch" type="sumbit"><i class="fa fa-search"></i></button>
    </div>
  </form> --}}
  <div class="row justify-content-center mt-2 mb-2">
    
    @forelse ($products as $item)
    <div class="col-md-3 mb-2">
      <div class="card h-100">
          <img class="card-img-top" src="{{ $item->gambar }}" alt="..." />
          <!-- Product details-->
          <div class="card-body p-4">
              <div class="text-center">
                  <!-- Product name-->
                  <h5 class="fw-bolder">{{ $item->nama_produk }}</h5>
                  <!-- Product reviews-->
                  <div class="d-flex justify-content-center small text-warning mb-2">
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                      <div class="bi-star-fill"></div>
                  </div>
                  <!-- Product price-->
                  Rp. {{ number_format($item->harga)  }}
              </div>
          </div>
          <!-- Product actions-->
          <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ url('/buy',['products' => $item->id]) }}">Beli</a></div>
          </div>
      </div>
    </div>
    @empty
    <div class="alert alert-info text-center" role="alert">
      Data tidak tersedia
    </div>
    @endforelse
    <br>
    <br>
  </div>
  <div class="col col-sm-6 xs-6  pull-right right">
    
  </div>
  <div class="row justify-content-center text-white">

    
    <div class="col-sm-6 xs-6">
      <p clas="text-white">
        Product Per Halaman : <b>{{ $products->perPage() }}</b> Dari : <b>{{ $products->total() }}</b> Data Product
      </p>
      <ul class="pagination hidden-xs">
          {{ $products->links() }}
      </ul>
    </div>
  </div>

</body>

@endsection