@extends('user.page.induk')
@section('title', 'History Detail')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4 mb-4">
            <a href="{{  url ('history') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5><strong>Kode Pesanan</strong><strong>{{ ($order->trx_id) }}</strong></h5>
                    @if($order->status == 0)
                    <h3>Belum dibayar</h3> 
                    @else
                    <h3>Sudah dibayar</h3>
                    @endif
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i> Detail Pemesanan</h3>
                    @if(!empty($order))
                    <p align="right">Waktu Pemesanan : {{ $order->created_at->format('d/m/Y')}} Pukul: {{ $order->created_at->format('h:i')}} </p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($order_details as $order_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img src="{{ $order_detail->gambar }}" alt="" style="width: 100px; height: 100px;"></td>
                                <td>{{ $order_detail->nama_produk }}</td>
                                <td>{{ $order_detail->quantity }} kain</td>
                                <td>Rp. {{ number_format($order_detail->price) }}</td>
                                <td><strong>Rp. {{ number_format($order->total) }}</strong></td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card mb-5">
                <div class="card-body">
                    @if($order->status == 0)
                    <button class="btn btn-warning" id="pay-button">Bayar Sekarang</button>
<<<<<<< HEAD

=======
>>>>>>> refs/remotes/origin/main
                    @endif
                </div>

            </div>
        </div>
        
    </div>
</div>
       
       <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
       <script type="text/javascript">
        // For example trigger on button clicked, or any time you need
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
          window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
              alert("payment success!"); console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!"); console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!"); console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>
@endsection