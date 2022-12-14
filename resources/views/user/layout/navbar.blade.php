<div class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
          <img src="{{ URL::to('/') }}/images/home copy.png" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
          <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container navbar-dark">
                <a class="navbar-brand" href="index.html">
                    <span> SiBatik </span>
                </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
              </button>
    
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                  <li class="nav-item @if(request()->is('home')) active @endif">
                    <a class="nav-link" href="/home">Beranda<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item @if(request()->is('shop')) active @endif">
                    <a class="nav-link" href="{{ route('shop') }}">Belanja </a>
                  </li>
                  <li class="nav-item @if(request()->is('about')) active @endif">
                    <a class="nav-link" href="/about">Tentang Kami</a>
                  </li>
                  @if (Auth::check())
                  <li class="nav-item @if(request()->is('/cart')) active @endif">
                    <a class="nav-link nav-cart" href="/cart">cart <span class="nav-cart-total">{{ Cart::getTotalQuantity()}}</span> </a>
                  </li>
                  @endif
                </ul>
                <div class="user_option">
                  @if (!Auth::check())
                    <a href="{{ route('login') }}" class="user_link">
                      <i class="fa fa-sign-in" aria-hidden="true" title="Login"></i>
                    </a>
                  @endif
                  @if (Auth::check())
                    <a href="{{ route('history') }}" class="user_link">
                      <i class="fa fa-history" data-toggle="tooltip" title="Riwayat Pesanan" style="padding: 8px"></i>
                    </a> 
                  @endif
                  @if (Auth::check())
                    <a href="{{ route('profile.index') }}" class="user_link">
                      <i class="fa fa-user" aria-hidden="true" title="Profil"></i>
                    </a>
                  @endif
                  @if (Auth::check())
                    <a href="{{ route('logout') }}" class="user_link">
                      <i class="fa fa-sign-out" data-toggle="tooltip" title="Logout" style="padding: 8px"></i>
                    </a> 
                  @endif
                </div>
              </div>
            </nav>
          </div>
        </header>
        <!-- end header section -->
    </div>
</div>
