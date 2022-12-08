@extends('user.page.induk')
@section('title','buy')
@section('content')
<style>
    
    .single_product {
        padding-top: 66px;
        padding-bottom: 140px;
        background-color: #e5e5e5;
        margin-top: 0px;
        padding: 17px
    }
    
    .product_name {
        font-size: 25px;
        font-weight: 400;
        margin-top: 0px
    }
    
    .product_price {
        display: inline-block;
        font-size: 20px;
        font-weight: 500;
        margin-top: 9px;
        clear: left
    }
    
    .singleline {
        margin-top: 1rem;
        margin-bottom: .40rem;
        border: 0;
        border-top: 1px solid rgba(0, 0, 0, .1)
    }
    
    .product_info {
        color: #4d4d4d;
        display: inline-block
    }
    
    .product_options {
        margin-bottom: 10px
    }
    
    .product_description {
        padding-left: 0px
    }
    
    
    .order_info {
        margin-top: 18px
    }
    
    .shop-button {
        height: 47px
    }

    
    .br-dashed {
        border-radius: 5px;
        border: 1px dashed #dddddd;
        margin-top: 6px
    }
    
    .pr-info {
        margin-top: 2px;
        padding-left: 2px;
        margin-left: -14px;
        padding-left: 0px
    }
    
    .break-all {
        color: #5e5e5e
    }
    
    .image_selected {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: calc(100% + 15px);
        height: 525px;
        -webkit-transform: translateX(-15px);
        -moz-transform: translateX(-15px);
        -ms-transform: translateX(-15px);
        -o-transform: translateX(-15px);
        transform: translateX(-15px);
        border: solid 1px #e8e8e8;
        box-shadow: 0px 0px 0px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 15px
    }
    
    
    .fs-10 {
        font-size: 10px
    }
    
    
    .row-underline {
        content: "";
        display: block;
        border-bottom: 2px solid #3798db;
        margin: 0px 0px;
        margin-bottom: 20px;
        margin-top: 15px
    }
    
    
    .padding-0 {
        padding-left: 0;
        padding-right: 0
    }
    
    .padding-2 {
        margin-right: 2px;
        margin-left: 2px
    }
    
    .vertical-line {
        display: inline-block;
        border-left: 3px solid #167af6;
        margin: 0 10px;
        height: 364px;
        margin-top: 4px
    }
    
    
    
    
    .combo-plus {
        margin-left: 10px;
        margin-right: 18px;
        margin-top: 10px
    }
    
    .mt-10 {
        margin-top: 10px
    }

    
    * {
        margin: 0;
        padding: 0;
        -webkit-font-smoothing: antialiased;
        -webkit-text-shadow: rgba(0, 0, 0, .01) 0 0 1px;
        text-shadow: rgba(0, 0, 0, .01) 0 0 1px
    }
    

    
    div {
        display: block;
        position: relative;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box
    }
    
    
    .single_product {
        padding-top: 16px;
        padding-bottom: 140px
    }
    
    .image_selected {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: calc(100% + 15px);
        height: 525px;
        -webkit-transform: translateX(-15px);
        -moz-transform: translateX(-15px);
        -ms-transform: translateX(-15px);
        -o-transform: translateX(-15px);
        transform: translateX(-15px);
        border: solid 1px #e8e8e8;
        box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        padding: 15px
    }
    
    .image_selected img {
        max-width: 100%
    }
    
    .product_category {
        font-size: 12px;
        color: rgba(0, 0, 0, 0.5)
    }
    
    .product_text {
        margin-top: 27px
    }
    
    .product_text p:last-child {
        margin-bottom: 0px
    }
    
    .order_info {
        margin-top: 16px
    }
    
</style>
<div class="single_product">
    <div class="container-fluid" style=" background-color: rgb(136, 131, 131); padding: 11px;">
        <div class="row">
            <div class="col-lg-4 order-lg-2 order-1">
                <div class="image_selected"><img src="{{ $products->gambar }}" alt=""></div>
            </div>
            <div class="col-lg-6 order-3">
                <form action="#" method="post">
                    @csrf
                    <div class="product_description">
                        <div class="product_name">{{ $products->nama_produk }}</div>
                        <input type="hidden" name="harga" value="{{ $products->nama_produk }}">
                        <div> <span class="product_price">Rp. {{ $products->harga }}</span>  </div>
                        <input type="hidden" name="harga" value="{{ $products->harga }}">
                        <hr class="singleline">
                        <div> <span class="product_info">{{ $products->keterangan }}<span></div>
                        <div><b><span class="">Stok<span></b></div>
                        <div> <span class="product_info">{{ $products->stok }}<span></div>
                        <input type="hidden" name="harga" value="{{ $products->stok }}">
                        <div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <b><span class="">Ukuran</span><br></b>
                                    <select class="form-control" name="ukuran">
                                        <option value="S">S</option>
                                        <option value="M">M</option>
                                        <option value="L">L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr class="singleline">
                        <div class="row">
                            <div class="col-xs-6 ">
                                    <b><label for="quantity">Jumlah</label></b>
                                    <input class="form-control" type="number" name="qty" pattern="[0-9]*" min="1" value="1" style="width: 80px;">    
                            </div>
                            <div class="col-xs-6 mt-4">
                                @if(Auth::check())
                                    <button type="button" class="btn btn-success shop-button btn-buy-now">Beli Sekarang</button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form class="d-none" method="post" id="frmCart" action="{{ route('cart.addCart') }}">
    @csrf
    <input type="hidden" name="product_id">
    <input type="hidden" name="size">
    <input type="hidden" name="name">
    <input type="hidden" name="price">
    <input type="hidden" name="image">
    <input type="hidden" name="quantity">
</form>
@endsection

@section("script")
<script>
    $(function(){
        $(document).on("click",".btn-buy-now",function(){
            let product_id = '{{ $products->id_product }}';
            let name = '{{ $products->nama_produk }}';
            let price = '{{ $products->harga }}';
            let image = '{{ $products->gambar }}';
            let quantity = $('input[name="qty"]').val();
            let size = $('select[name="ukuran"]').val();

            $('#frmCart').find('input[name="product_id"]').val(product_id);
            $('#frmCart').find('input[name="name"]').val(name);
            $('#frmCart').find('input[name="price"]').val(price);
            $('#frmCart').find('input[name="image"]').val(image);
            $('#frmCart').find('input[name="quantity"]').val(quantity);
            $('#frmCart').find('input[name="size"]').val(size);

            $("#frmCart").submit();
        })
    })
</script>
@endsection