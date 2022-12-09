@extends('admin\isi.Admin')
@section('title','Update Produk')
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
                      {{-- Jenis Product --}}
                        <label class="form-label" for="jenis">Jenis</label>
                        <input class="form-control" type="text" name="jenis">
                        @error('jenis')
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
                  {{-- Keterangan --}}
                  <div class="m-2">
                    <label class="form-label" for="keterangan">Keterangan</label>
                    <input class="form-control" type="text-field" name="keterangan">
                    @error('keterangan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                    
                </div>
              </div>
            </div>
        </div> 
    </div>
    {{-- Form kedua --}}
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="table-responsive">
            <table class="table table-striped table-bordered">
              <thead>
                <th>UKURAN</th>
                <th>STOK</th>
                <th>Harga</th>
              </thead>
              <tbody>
                <tr>
                  <td name="size_s">
                    S
                  </td>
                  <td>
                    <input type="text" class="form-control" name="stok_s">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="harga_s">
                  </td>
                </tr>
                <tr>
                  <td name="size_m">
                    M
                  </td>
                  <td>
                    <input type="text" class="form-control" name="stok_m">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="harga_m">
                  </td>
                </tr>
                <tr>
                  <td name="size">
                    L
                  </td>
                  <td>
                    <input type="text" class="form-control" name="stok_l">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="harga_l">
                  </td>
                </tr>
                <tr>
                  <td>
                    XL
                  </td>
                  <td>
                    <input type="text" class="form-control" name="stok_xl">
                  </td>
                  <td>
                    <input type="text" class="form-control" name="harga_xl">
                  </td>
                </tr>
              </tbody>
            </table>
            <button class="btn mb-5 text-white" style="background-color:#102744; font-family:'Times New Roman', Times, serif" type="submit"name="tambah">simpan</button>
          </div>
        </div>
      </div>
    </div>
    
  </form>
@endsection