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
                  <li class="nav-item @if(request()->is('/home')) active @endif">
                    <a class="nav-link @if(request()->is('/home')) active @endif" href="/home">Beranda<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link @if(request()->is('/shop')) active @endif" href="{{ route('shop') }}">Belanja </a>
                  </li>
                  <li class="nav-item @if(request()->is('/about')) active @endif">
                    <a class="nav-link" href="/about">Tentang Kami</a>
                  </li>
                </ul>
                <div class="user_option">
                  <a href="{{ route('profile.index') }}" class="user_link">
                    <i class="fa fa-user" aria-hidden="true" title="Profil"></i>
                  </a>
                  <a href="{{ route('logout') }}" class="user_link">
                    <i class="fa fa-sign-out" data-toggle="tooltip" title="Logout" style="padding: 8px"></i>
                  </a>
                </div>
              </div>
            </nav>
          </div>
        </header>
        <!-- end header section -->
    </div>
</div>
