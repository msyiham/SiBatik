@extends('admin\isi.Admin')
@section('title','InputProduk')
@section('input')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<h3 class="mt-3" style="margin-left: 25px" ><i class="fa-solid fa-table"></i> Input Produk </h3>
    <hr>
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
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
                        <input class="form-control" type="text" name="nama_produk">
                        @error('nama_produk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-2">
                      {{-- stok Product --}}
                        <label class="form-label" for="stok">Stok</label>
                        <input class="form-control" type="text" name="stok">
                        @error('stok')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-2">
                      {{-- harga Product --}}
                        <label class="form-label" for="harga">Harga</label>
                        <input class="form-control" type="text" name="harga">
                        @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-2">
                      {{-- ukuran Product --}}
                        <label class="form-label" for="ukuran">Ukuran</label>
                        <div class="row">
                          <div class="col-2">
                            <input class="form-control" type="text" name="ukuran">
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
                      <input id="keterangan" value="Editor content goes here" type="hidden" name="keterangan">
                      <trix-editor input="keterangan"></trix-editor>
                      @error('keterangan')
                      <div class="text-danger">{{ $message }}</div>
                      @enderror
                    </div>
                    {{-- Upload Gambar --}}
                    <div class="m-2">
                      <label class="form-label" for="gambar">Upload Gambar</label>
                      <input class="form-control" type="file" name="gambar">
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