@extends('Master.Admin')
@section('title','Dashbord')
@section('dasbord')
<style>
    i{
        margin-right: 10px;
    }
    .d{
        margin-top: 50px;
    }
    .card-body-icon{
        position: absolute;
        z-index: 0;
        top: 7px;
        right: 4px;
        opacity: 0.4;
        font-size: 100px; 
    }
    .a{
        margin-left: 30px;
        margin-right: 20px;
    }
    .b{
        margin-right: 20px;
    }
    .table{
        margin-top: 50px;
        margin-left: 22px;
    }
</style>
<div class="col-md-10 p-5 pt-2 d">
    <h3><i class="fa-solid fa-gauge-high "></i> Dashboard </h3>
    <hr>
    <div class="row">
        <div class="card bg-success col-md-4 a" style="width: 18rem; height:10rem;">
            <div class="card-body-icon">
                <i class="fa-regular fa-credit-card bg-success"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white">Total Pemasukan</h5>
              <div class="display-6 text-white">Rp.1000.000</div>
              <br>
              <a href="#"><p class="card-text text-white"> lihat detail <i class="fas fa-angle-double-right"></i> </p></a>
            </div>
          </div>
        <div class="card bg-danger col-md-4 b" style="width: 18rem; height:10rem;">
            <div class="card-body-icon">
                <i class="fa-solid fa-user  "></i>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white">Jumlah Pembeli</h5>
              <div class="display-6 text-white">50</div>
              <br>
              <a href="#"><p class="card-text text-white"> lihat detail <i class="fas fa-angle-double-right"></i> </p></a>
            </div>
          </div>
        <div class="card bg-warning col-md-4" style="width: 18rem; height:10rem;">
            <div class="card-body-icon">
                <i class="fa-solid fa-bag-shopping"></i>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white">Total Produk Terjual</h5>
              <div class="display-6 text-white">100</div>
              <br>
              <a href="#"><p class="card-text text-white"> lihat detail <i class="fas fa-angle-double-right"></i> </p></a>
            </div>
          </div>
    </div>
    <table class="table table-bordered " style="width:92%;" >
        <thead>
          <tr style="background-color:rgba(225, 240, 23, 0.811) ">
            <th scope="col">Produk</th>
            <th scope="col">Jumlah Produk</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td><i class="fa-solid fa-pen-to-square"></i></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="">Larry the Bird</td>
            <td>asdassadasd</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
    <table class="table table-bordered " style="width:92%;" >
        <thead>
          <tr style="background-color:rgba(225, 240, 23, 0.811) ">
            <th scope="col">Produk</th>
            <th scope="col">Jumlah Produk</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td colspan="">Larry the Bird</td>
            <td>asdassadasd</td>
            <td>@twitter</td>
          </tr>
        </tbody>
      </table>
</div>
@endsection