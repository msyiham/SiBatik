@extends('admin\isi.Admin')
@section('title','Update Produk')
@section('customer')
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<h3 class="mt-3" style="margin-left: 25px" ><i class="fa-solid fa-table"></i> Edit Produk </h3>
    <hr>
<form action="{{ url('/update/'.$selected->id) }}" method="POST" enctype="multipart/form-data">
  @method('PATCH')
  @csrf
  <div class="pt-2 mb-5" style="margin-top: 10px;">
      <div class="row justify-content-center">
          <div class="col-lg-9">
              <div class="card">
              <div class="card-header"style="background-color: #102744">
                  <h3 class="text-white" style="text-align:center;">TAMBAH PRODUK</h3>
              </div>
              <div class="card-body">
                {{-- form pertama --}}
                      <div class="m-2">
                        {{-- Nama Product --}}
                          <label class="form-label " for="nama_produk">Nama Produk</label>
                          <input class="form-control" type="text" name="nama_produk" value="{{ $selected->nama_produk }}">
                          @error('nama_produk')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="m-2">
                        {{-- stok Product --}}
                          <label class="form-label" for="stok">Stok</label>
                          <input class="form-control" type="text" name="stok" value="{{ $selected->stok }}">
                          @error('stok')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="m-2">
                        {{-- harga Product --}}
                          <label class="form-label" for="harga">Harga</label>
                          <input class="form-control" type="text" name="harga" value="{{ $selected->harga }}">
                          @error('harga')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                      <div class="m-2">
                        {{-- ukuran Product --}}
                          <label class="form-label" for="ukuran">Ukuran</label>
                          <div class="row">
                            <div class="col-2">
                              <input class="form-control" type="text" name="ukuran" value="{{ $selected->ukuran }}">
                            </div>
                            <div class="col">
                                <span>X 1 Meter</span>
                            </div>
                          </div>
                          
                          @error('ukuran')
                          <div class="text-danger">{{ $message }}</div>
                          @enderror
                      </div>
                        {{-- Keterangan --}}
                      <div class="m-2">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea name="keterangan" class="form-control summernote">{{ $selected->keterangan }}</textarea>
                        @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      {{-- Upload Gambar --}}
                      <div class="m-2">
                        <label class="form-label" for="gambar">Upload Gambar</label>
                        <input class="form-control" type="file" name="gambar">
                        <p>Kosongkan jika tidak diubah</p>
                        @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                      </div>
                      <button class="btn mb-5 text-white mx-auto" style="background-color:#102744; font-family:'Times New Roman', Times, serif" type="submit"name="tambah">simpan</button>
                      
                  </div>
                </div>
          </div>
      </div> 
  </div>
    {{-- Form kedua --}}
    
</form>
@endsection