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
    
    .product_quantity {
        width: 104px;
        height: 47px;
        border: solid 1px #e5e5e5;
        border-radius: 3px;
        overflow: hidden;
        padding-left: 8px;
        padding-top: -4px;
        padding-bottom: 44px;
        float: left;
        margin-right: 22px;
        margin-bottom: 11px
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
    
    ul {
        list-style: none;
        margin-bottom: 0px
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
    
    .product_quantity {
        width: 182px;
        height: 50px;
        border: solid 1px #e5e5e5;
        border-radius: 5px;
        overflow: hidden;
        padding-left: 25px;
        float: left;
        margin-right: 30px
    }
    
    .product_quantity span {
        display: block;
        height: 50px;
        font-size: 16px;
        font-weight: 300;
        color: rgba(0, 0, 0, 0.5);
        line-height: 50px;
        float: left
    }
    
    .product_quantity input {
        display: block;
        width: 30px;
        height: 50px;
        border: none;
        outline: none;
        font-size: 16px;
        font-weight: 300;
        color: rgba(0, 0, 0, 0.5);
        text-align: left;
        padding-left: 9px;
        line-height: 50px;
        float: left
    }
    
    .quantity_buttons {
        position: absolute;
        top: 0;
        right: 0;
        height: 100%;
        width: 29px;
        border-left: solid 1px #e5e5e5
    }
    
    .quantity_inc,
    .quantity_dec {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 100%;
        height: 50%;
        cursor: pointer
    }
    
    .quantity_control i {
        font-size: 11px;
        color: rgba(0, 0, 0, 0.3);
        pointer-events: none
    }
    
    .quantity_control:active {
        border: solid 1px rgba(14, 140, 228, 0.2)
    }
    
    .quantity_inc {
        padding-bottom: 2px;
        justify-content: flex-end;
        border-top-right-radius: 5px
    }
    
    .quantity_dec {
        padding-top: 2px;
        justify-content: flex-start;
        border-bottom-right-radius: 5px
    }
</style>
<div class="single_product">
    <div class="container-fluid" style=" background-color: #fff; padding: 11px;">
        <div class="row">
            <div class="col-lg-4 order-lg-2 order-1">
                <div class="image_selected"><img src="images/batik1.png" alt=""></div>
            </div>
            <div class="col-lg-6 order-3">
                <div class="product_description">
                    <div class="product_name">Batik 1</div>
                    <div> <span class="product_price">Rp. 50.000</span>  </div>
                    <hr class="singleline">
                    <div> <span class="product_info">Keterangan Barang<span></div>
                    <div>
                        <div class="row" style="margin-top: 15px;">
                            <div class="col-xs-6" style="margin-left: 15px;"> <span class="product_options">Ukuran</span><br> <button class="btn btn-primary btn-sm">S</button> <button class="btn btn-primary btn-sm">M</button> <button class="btn btn-primary btn-sm">L</button> <button class="btn btn-primary btn-sm">XL</button> </div>
                        </div>
                    </div>
                    <hr class="singleline">
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                    </div>
                    <div class="row">
                        <div class="col-xs-6" style="margin-left: 13px;">
                            <div class="product_quantity"> <span>Jumlah: </span> <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                <div class="quantity_buttons">
                                    <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
                                    <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <button type="button" class="btn btn-success shop-button">Beli Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
