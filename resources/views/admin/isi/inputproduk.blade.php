@extends('admin\isi.Admin')
@section('title','InputProduk')
@section('input')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="col-md-10 p-5 pt-2 d " style="margin-top: 10px">
    <h3 class="mt-3"><i class="fa-solid fa-table"></i> Input Produk </h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
            <div class="card-header"style="background-color: #12a750">
                <h3 style="text-align:center">TAMBAH PRODUK</h3>
            </div>
             <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="m-2">
                        <label class="form-label" for="nama_produk">Nama Produk</label>
                        <input class="form-control" type="text" name="nama_produk">
                        @error('nama_produk')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Ukuran</label>
                        <div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ukuran"
                            id="S" value="S"
                            {{ old('ukuran')=='S' ? 'checked': '' }} >
                            <label class="form-check-label" for="S">S</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ukuran"
                            id="M" value="M"
                            {{ old('ukuran')=='M' ? 'checked': '' }} >
                            <label class="form-check-label" for="M">M</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ukuran"
                            id="L" value="L"
                            {{ old('ukuran')=='L' ? 'checked': '' }} >
                            <label class="form-check-label" for="L">L</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ukuran"
                            id="XL" value="XL"
                            {{ old('ukuran')=='XL' ? 'checked': '' }} >
                            <label class="form-check-label" for="XL">XL</label>
                          </div>
                          <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ukuran"
                            id="XXL" value="XXL"
                            {{ old('ukuran')=='XXL' ? 'checked': '' }} >
                            <label class="form-check-label" for="XXL">XXL</label>
                          </div>
                          @error('ukuran')
                            <div class="text-danger">{{ $message }}</div>
                          @enderror
                        </div>
                      </div>
                    <div class="m-2">
                        <label class="form-label" for="stok">Stok</label>
                        <input class="form-control" type="text" name="stok">
                        @error('stok')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="harga">Harga</label>
                        <input class="form-control" type="text" name="harga">
                        @error('harga')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <input class="form-control" type="text-field" name="keterangan">
                        @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="gambar">Upload Gambar</label>
                        <input class="form-control" type="file" name="gambar">
                        @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                <button class="btn btn-success" type="submit"name="tambah">simpan</button>
                </form>
             </div>
            </div>
        </div>
    </div> 
</div>
@endsection