<style>
  .nav-item.active {
  color: rgb(219, 212, 22);
}
.nav-link.active {
  color: rgb(219, 212, 22);
}
</style>
<div class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
          <img src="images/home copy.png" alt="">
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
                  <li class="nav-item">
                    <a class="nav-link @yield('home')" href="/home">Beranda<span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link @if(request()->is('/shop')) active @endif" href="/shop">Belanja </a>
                  </li>
                  <li class="nav-item @if(request()->is('TUBES/about')) active @endif">
                    <a class="nav-link" href="/about">Tentang Kami</a>
                  </li>
                </ul>
                <div class="user_option">
                  <a href="/profil" class="user_link">
                    <i class="fa fa-user" aria-hidden="true"></i>
                  </a>
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                    </svg>
                  </a>
                </div>
              </div>
            </nav>
          </div>
        </header>
        <!-- end header section -->
    </div>
</div>
