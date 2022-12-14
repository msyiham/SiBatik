<style>
    .demo{ font-family: 'Noto Sans', sans-serif; }
.w-12{ width: 125px; }
.w-4{ width: 40px; }
.panel{
    border-radius: 0;
    border: none;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}
.panel .panel-heading{
    background: linear-gradient(#f5f5f5, #d9d9d9);
    padding: 15px;
    border-radius: 0;
    border: none;
}
.panel .panel-heading .title{
    color: #555;
    font-size: 22px;
    font-weight: 700;
    text-transform: capitalize;
    line-height: 35px;
    margin: 0;
}
.panel .panel-heading .btn{ border-radius: 0; }
.panel .panel-body{ padding: 0; }
.panel .panel-body .table{
    background: linear-gradient(transparent, rgba(255, 255, 255, 0.2), transparent);
    border: 1px solid #dedede;
}
.panel .panel-body .table thead tr th{
    color: #555;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    text-align: center;
    padding: 15px;
    border: none;
    border: 1px solid #dedede;
}
.panel .panel-body .table tbody tr td{
    color: #777;
    font-size: 15px;
    padding: 15px;
    vertical-align: middle;
    border: 1px solid #dedede;
}
.panel .panel-body .table tbody .action-list{
    padding: 0;
    margin: 0;
    list-style: none;
}
/* .panel .panel-body .table tbody .action-list li{
    margin: 0 5px;
    display: inline-block;
}
.panel .panel-body .table tbody .action-list li a{
    font-size: 15px;
    line-height: 33px;
    height: 35px;
    width: 35px;
    padding: 0;
    transition: all 0.3s ease 0s;
} */
.panel .panel-footer{
    color: #555;
    background: linear-gradient(#d9d9d9,#f5f5f5);
    padding: 15px;
    border: none;
    border-radius: 0;
}
.panel .panel-footer .col{ line-height: 30px; }
/* .pagination{ margin: 0; }
.pagination li a{
    color: #555;
    background-color: transparent;
    border: 2px solid#555;
    font-size: 16px;
    font-weight: 500;
    text-align: center;
    line-height: 27px;
    width: 31px;
    height: 31px;
    padding: 0;
    margin: 0 3px;
    border-radius: 0;
}
.pagination li a:hover,
.pagination li a:focus,
.pagination li.active a,
.pagination li.active a:hover{
    color: #fff;
    background-color: #555;
    border-color: #555;
} */
/* .pagination li:first-child a,
.pagination li:last-child a{
    border-radius: 0;
    width: auto;
    padding: 0 10px;
} */
@media only screen and (max-width:767px){
    .panel .panel-heading .title{
        text-align: center;
        margin: 0 0 10px;
    }
    .panel .panel-heading .btn-group{
        font-size: 0;
        text-align: center;
        margin: 0 auto;
        display: block;
    }
    .panel .panel-heading .btn-group .btn{ float: none; }
}
</style>
@extends('admin\isi.Admin')
@section('title','Product')
@section('produk')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="col-md-10 p-5 pt-2 d justify-content-center" style="margin-top: 10px">
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
                                        <a href="/edit" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                                <td>{{ $item ->nama_produk}}</td>
                                <td><img class="card-img-top" src="{{ $item->gambar }}" alt="..." style="width:80px; height:80px;"/></td>
                                <td>{{ $item ->stok}}</td>
                                <td>{{ $item ->harga}}</td>
                                <td>{{ $item ->ukuran}} meter x 1 meter</td>
                                <td>{!! $item['keterangan'] !!}</td>
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