<!DOCTYPE html>
<html lang="en">
<head>
  <title>MOLI</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ base_url() }}assets/vendors/material-admin/images/favicon.png">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/styles/bootstrap4/bootstrap.min.css">
  <link href="{{ base_url() }}assets/vendors/onetech/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/plugins/OwlCarousel2-2.2.1/animate.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/plugins/slick-1.8.0/slick.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/styles/main_styles.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/styles/responsive.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/onetech/styles/custom.css">
  <link rel="stylesheet" type="text/css" href="{{ base_url() }}assets/vendors/datatables/css/dataTables.bootstrap4.min.css">
  @yield('header')
</head>

<body>

  <div class="super_container">

    <!-- Header -->
    <header class="header">

      <!-- Header Main -->

      <div class="header_main">
        <div class="container">
          <div class="row">

            <!-- Logo -->
            <div class="col-lg-3 col-sm-3 col-3 order-1">
              <div class="logo_container">
                <div class="logo">
                  <img class="img-fluid float-left" width="90" src="{{base_url('assets/vendors/mylogin/img/logo.jpg')}}" alt="">
                  <a href="{{base_url()}}" class="d-block web-title">MOLI</a>
                  <span class="text-muted">Cara mudah cari ikan</span>
                </div>
              </div>
            </div>

            <!--  -->
            <div class="col-lg-9 col-9 order-lg-3 order-2 text-lg-left tfrext-right">
              <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">

                @if(!isset($_SESSION['user']))
                  <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist_content">
                      <a class="btn btn-primary" href="{{ base_url('Login') }}">Masuk</a>
                    </div>
                  </div>
                @else
                  {{-- Toko --}}
                  <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist_icon">
                      <h3 class="fa fa-building"></h3>
                    </div>
                    <div class="wishlist_content">
                      <div class="wishlist_text"><a href="{{ base_url('tokoSaya') }}">Toko</a></div>
                    </div>
                  </div>

                  <!-- Cart -->
                  <div class="cart wishlist">
                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                      <div class="cart_icon">
                        <img src="{{ base_url() }}assets/vendors/onetech/images/cart.png" alt="">
                      </div>
                      <div class="cart_content">
                        <div class="cart_text"><a href="{{ base_url('keranjang') }}">Keranjang</a></div>
                        <div class="cart_price"></div>
                      </div>
                    </div>
                  </div>

                  {{-- User menu --}}
                  <div class="d-flex flex-row align-items-center justify-content-end">
                    <div class="wishlist_icon">
                      <h3 class="fa fa-user"></h3>
                    </div>
                    <div class="wishlist_content">
                      <div class="dropdown open">
                        <div class="wishlist_text">
                          <a class="dropdown-toggle" id="user_menu" data-toggle="dropdown">{{ $_SESSION['user']->nama }}</a>
                          <div class="dropdown-menu" aria-labelledby="user_menu">
                            <a class="dropdown-item" href="{{ base_url('transaksi') }}">Transaksi Pembelian</a>
                            <a class="dropdown-item" href="{{ base_url('profil') }}">Profil</a>
                            <a class="dropdown-item" href="{{ base_url('login/logoutProcess') }}">Keluar</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Main Navigation -->

      <nav class="main_nav">
        <div class="container">
          <div class="row">
            <div class="col">

              <div class="main_nav_content d-flex flex-row">

                <!-- Title -->

                <div class="cat_menu_container">
                  <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                    <div class="fa fa-tag text-light"></div>
                    <div class="cat_menu_text">@yield('title')</div>
                  </div>
                </div>

                <!-- Main Nav Menu -->

                <div class="main_nav_menu ml-auto">
                  <ul class="standard_dropdown main_nav_dropdown">
                    <li><a href="{{ base_url() }}">Beranda<i class="fas fa-chevron-down"></i></a></li>
                    <li><a href="{{ base_url('kategori') }}">Kategori<i class="fas fa-chevron-down"></i></a></li>
                    <li><a href="{{ base_url('produk') }}">Produk<i class="fas fa-chevron-down"></i></a></li>
                    <li><a href="{{ base_url('toko') }}">Toko<i class="fas fa-chevron-down"></i></a></li>
                    <li><a href="{{ base_url('tentang') }}">Tentang<i class="fas fa-chevron-down"></i></a></li>

                  </ul>
                </div>

                <!-- Menu Trigger -->

                <div class="menu_trigger_container ml-auto">
                  <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                    <div class="menu_burger">
                      <div class="menu_trigger_text">menu</div>
                      <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </nav>

    </header>


    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 footer_col">
            <div class="footer_column footer_contact">
              <div class="logo_container">
                <div class="logo">
                  <a href="#">Mall Ikan</a>
                  <p class="text-muted">Cara mudah cari ikan</p>
                </div>
              </div>
              <div class="footer_social">
                <ul>
                  <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                  <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                  <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                  <li><a href="#"><i class="fab fa-google"></i></a></li>
                  <li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
                </ul>
              </div>
            </div>
          </div>

          <div class="col-lg-2 offset-lg-2">
            <div class="footer_column">
              <div class="footer_title">Main Menu</div>
              <ul class="footer_list">
                <li><a href="{{ base_url() }}">Beranda</a></li>
                <li><a href="{{ base_url('kategori') }}">Kategori</a></li>
                <li><a href="{{ base_url('produk') }}">Produk</a></li>
                <li><a href="{{ base_url('toko') }}">Toko</a></li>
                <li><a href="{{ base_url('tentang') }}">Tentang</a></li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </footer>

    <!-- Copyright -->
    <div class="copyright">
      <div class="container">
        <div class="row">
          <div class="col">

            <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
              <div class="copyright_content">
                Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="{{ base_url() }}assets/vendors/onetech/js/jquery-3.3.1.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/styles/bootstrap4/popper.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/styles/bootstrap4/bootstrap.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/greensock/TweenMax.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/greensock/TimelineMax.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/scrollmagic/ScrollMagic.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/greensock/animation.gsap.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/greensock/ScrollToPlugin.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/slick-1.8.0/slick.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/plugins/easing/easing.js"></script>
  <script src="{{ base_url() }}assets/vendors/onetech/js/custom.js"></script>
  <script src="{{ base_url() }}assets/vendors/datatables/js/datatables.min.js"></script>
  <script src="{{ base_url() }}assets/vendors/datatables/js/dataTables.bootstrap4.min.js"></script>
  <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );
  </script>

  @yield('script')
</body>

</html>
