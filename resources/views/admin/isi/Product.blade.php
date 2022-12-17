<style>

</style>
@extends('admin\isi.Admin')
@section('title','Product')
@section('produk')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="col-md-10 p-5 pt-2 d justify-content-center" style="margin-top: 10px">
    @include('sweetalert::alert')
    <div class="">
        <div class="col">
            <h3 class="mt-3"><i class="fa-solid fa-shirt"></i> Produk </h3>
        </div>
        
        <hr>
    </div>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css /> -->
    <div class="panel">
        <div class="panel-heading">
            <div class="row">
                <div class="col col-sm-6 col-xs-12">
                 
                    <h4 class="">Data List</h4>
                 
                </div>
                {{-- <div class="col-sm-6 col-xs-12 text-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-success">Completed</button>
                        <button type="button" class="btn btn-warning">Pending</button>
                        <button type="button" class="btn btn-primary">All</button>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="panel-body table-responsive">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="w-12"><i class="fa fa-wrench"></i></th>
                            <th>Nama Produk</th>
                            <th>Gambar</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th>Ukuran</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($products as $item)
                            <tr>
                                <td>
                                        <a href="{{ url('/edit/'.$item->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="{{ url('/delete/'.$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                <td>{{ $item ->nama_produk}}</td>
                                <td><img class="card-img-top" src="{{ $item->gambar }}" alt="..." style="width: 100px; height: 100px;"/></td>
                                <td>{{ $item ->stok}}</td>
                                <td>{{ $item ->harga}}</td>
                                <td>{{ $item ->ukuran}}</td>
                                <td>{!! $item ->keterangan!!}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
      
        </div>
        <div class="panel-footer">
            <div class="row">
                <div class="col col-sm-6 col-xs-6">Data Per Halaman : <b>{{ $products->perPage() }}</b> Dari : <b>{{ $products->total() }}</b> Data Product</div>
                <div class="col-sm-6 col-xs-6">
                    <ul class="pagination hidden-xs pull-right">
                        {{ $products->links() }}
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="" >
        <a href="{{ route('products.create') }}" class="btn btn-primary">
            <i class="fa-solid fa-plus"></i>
            Tambah Produk
        </a>
    </div>
</div>


@endsection