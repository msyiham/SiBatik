@extends('Master.template')
@section('title','InputProduk')
@section('input')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="col-md-10 p-5 pt-2 d" style="margin-top: 10px">
    <h3 class="mt-3"><i class="fa-solid fa-table"></i> Input Produk </h3>
    <hr>
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card">
            <div class="card-header"style="background-color: #12a750">
                <h3 style="text-align:center">TAMBAH PRODUK</h3>
            </div>
             <div class="card-body">
                <form action="" method="POST">
                    <div class="m-2">
                        <label class="form-label" for="nim">Nama</label>
                        <input class="form-control" type="text" name="nim">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="nama">Stok</label>
                        <input class="form-control" type="text" name="nama">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="jurusan">Harga</label>
                        <input class="form-control" type="text" name="jurusan">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="tanggal">Keterangan</label>
                        <input class="form-control" type="text" name="tanggal">
                    </div>
                    <div class="m-2">
                        <label class="form-label" for="gamabr">Upload Gambar</label>
                        <input class="form-control" type="file" name="gambar">
                    </div>
                <input type="hidden" name="id" value="100"><br>
                <button class="btn btn-success" type="submit"name="tambah">simpan</button>
                </form>
             </div>
            </div>
        </div>
    </div> 
</div>
@endsection