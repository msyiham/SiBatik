<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cart</title>
  </head>
  <body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Quantity</th>
                            <th>Sub Total</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @php
                                $nomor = 1;
                            @endphp
                            @forelse ($cartItems as $index => $row)
                            <tr>
                                <td>{{ $nomor }}</td>
                                <td>
                                    <img src="{{ $row->attributes->image }}" style="width: 80px;height:80px;">
                                </td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>
                                    {{ $row->attributes->subtotal }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-danger btn-delete" data-id="{{ $row->id }}">Hapus</a>
                                </td>
                            </tr>

                            @php
                                $nomor++;
                            @endphp
                            @empty
                            <tr class="text-center">
                                <td colspan="10">Data tidak ditemukan</td>
                            </tr>   
                            @endforelse

                            @if(count($cartItems) >= 1)
                            <tr>
                                <td colspan="10"> Total: {{ Cart::getTotal() }}</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <a href="{{ route('cart.clearAllCart') }}" class="btn btn-warning">Hapus Semua</a>
            </div>
        </div>
    </div>

    <form class="d-none" method="post" id="frmDelete" action="{{ route('cart.removeCart') }}">
        @csrf
        <input type="hidden" name="product_id">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $(document).on("click",".btn-delete",function(){
                let product_id = $(this).data("id");
                $('#frmDelete').find('input[name="product_id"]').val(product_id);
                $("#frmDelete").submit();
            })
        })
    </script>
  </body>
</html>