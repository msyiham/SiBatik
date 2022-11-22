@extends('Master.template')
@section('title','Product')
@section('produk')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<div class="col-md-10 p-5 pt-2 d" style="margin-top: 10px">
    <h3 class="mt-3"><i class="fa-solid fa-shirt"></i> Produk </h3>
    <hr>
    <div class="row mt-5 justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h1>Data Product</h1>
                </div>
                <div class="card-body">
                    <div class="row" >
                        <table class="table mt-4" id="myTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Stok</th>
                                    <th>Harga</th>
                                    <th>Keterangan</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($hmm as $item)
                                    <tr align="left">
                                        <td>{{ $item['nama_barang'] }}</td>
                                        <td>{{ $item['stok_barang'] }}</td>
                                        <td>{{ $item['harga_barang'] }}</td>
                                        <td>{{ $item['keterangan_barang'] }}</td>
                                        <td>
                                            <form action="">
                                                <a href="edit.php"><button type="button" class="btn btn-warning"name="edit"><i class="fa fa-pencil" ></i></button></a>
                                              <a href="#" class="btn btn-danger btn-xs btn-delete"><i class="fa fa-trash"></i></a>         
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger" role="alert">
                                        Data tidak valid!
                                    </div>
                                 @endforelse
                            </tbody>
                        </table>
                    </div>
                   </div>
                  </div>
                 </div>
               </div>
            </div>
    </div>
</div>
<script>
    $(document).ready(function () {
    $('#myTable').DataTable();
    });  
</script>

@endsection