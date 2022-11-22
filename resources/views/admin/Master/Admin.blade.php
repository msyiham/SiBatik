<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  <style>
    ul li{
      padding: 15px;
    }
    i{
      margin-right: 10px;
    }
    .nav-link:hover{
    background-color: rgb(228, 62, 62);
  }
  </style>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top" style="background-color:rgba(104, 2, 2, 0.929)">
        <div class="container-fluid">
          <a class="navbar-brand text-white" href="#"><i class="fa-regular fa-user mr-3"></i> SELAMAT DATANG ADMIN | <b style="font-family: 'Times New Roman', Times, serif">SiBatik</b></a>
              <form class="d-flex ml-auto" style="margin-left:35%" role="search">
                <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
              </form>
              <div class="icon mr-3">
                <h5>
                  <i class="fa-solid fa-envelope mr-3 text-white" data-toggle="tooltip" title="Surat Masuk" style="padding: 8px"></i>
                  <i class="fa-solid fa-bell mr-3 text-white" data-toggle="tooltip" title="Notifikasi" style="padding: 8px"></i>
                  <i class="fa-solid fa-right-from-bracket mr-3 text-white" data-toggle="tooltip" title="Sign Out" style="padding: 8px"></i>
                </h5>
              </div>
          </div>
        </div>
      </nav>
      <div class="row no-gutters mt-5" style="bottom: 0px">
        <div class="col-md-2 mt-2 pt-4 pr-3 " style="background-color: rgba(138, 5, 5, 0.929)"  >
          <ul class="nav flex-column ml-3 mb-5">
            <li class="nav-item">
              <a class="nav-link active text-white" aria-current="page" href="/Dashbord"> <i class="fa-solid fa-gauge-high "></i> Dashbord</a><hr size="4px" class="bg-light " >
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/Customer"><i class="fa-solid fa-user "></i> Customer</a><hr size="4px" class="bg-light">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="/Produk"><i class="fa-solid fa-shirt "></i> Product</a><hr size="4px" class="bg-light">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#"><i class="fa-solid fa-table "></i> Input Product</a><hr size="4px" class="bg-light">
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="#"> </a>
          </ul>
        </div>
        @yield('dasbord')
        @yield('customer')
        @yield('produk')
      </div >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

  </body>
</html>