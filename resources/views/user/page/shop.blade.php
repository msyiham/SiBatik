@extends('user.page.induk')
@section('title','Sibatik-Toko')
@section('content')

<body style=" background-color: #222831;">
  <div class="row mt-5 mb-5">
    @forelse ($products as $item)
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
  
  
  </div>
</body>

@endsection