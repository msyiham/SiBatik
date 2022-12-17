<!DOCTYPE html>
<html lang="en">
<head>
  <script type="text/javascript"
  src="https://app.midtrans.com/snap/snap.js"
  data-client-key="Mid-client-vr5EDqQt3zg2reE5"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="images/SiBatik.png" type="">
    <!-- bootstrap core css -->
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css'>
    {{-- <link rel="stylesheet" type="text/css" href="{{ URL::to('/') }}/css/bootstrap.css" /> --}}
    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
      integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
      crossorigin="anonymous"
    />
    <!-- font awesome style -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css'><link rel="stylesheet" href="./style.css">
    <link href="{{ URL::to('/') }}/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ URL::to('/') }}/css/style.css" rel="stylesheet" />
    <link href="{{ URL::to('/') }}/css/shop.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ URL::to('/') }}/css/responsive.css" rel="stylesheet" />

    <style>
      .nav-cart{
        position: relative;
      }
      .nav-cart-total{
        font-size: 9pt;
        color: white;
        position: absolute;
        right: 0;
        top: 0;
        background-color: brown;
        border-radius: 200px !important;
        padding-right: 3px;
        padding-left: 3px;
      }
    </style>
</head>
<body>
  @include('sweetalert::alert')
    @include('user.layout.navbar')
    @yield('content')
    @include('user.layout.footer')

    <!-- jQery -->
    <script src="{{ URL::to('/') }}/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- bootstrap js -->
    <script src="{{ URL::to('/') }}/js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ URL::to('/') }}/js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap"></script>
    <!-- End Google Map -->

    @yield("script")
</body>
</html>