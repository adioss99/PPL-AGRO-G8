<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')

  </head>

  <body>
    <div class="page-dashboard">
      <div class="d-flex" id="wrapper" data-aos="fade-right">
        <!-- Sidebar -->
        <div class="border-right" id="sidebar-wrapper">
          <div class="sidebar-heading text-center">
            <img src="/images/db-logo.svg" alt="" class="my-4" />
          </div>
          <div class="list-group list-group-flush">
            <a
              href="{{route('dashboard')}}"
              class="list-group-item list-group-item-action"
              ><i class="fa-solid fa-gauge"></i> Dashboard</a
            >
            <a
              href="{{route('dashboard-products')}}"
              class="list-group-item list-group-item-action {{(request()->is('user/products*'))?'active':''}}"
              ><i class="fa-solid fa-boxes-stacked"></i> Produk</a
            >
            <a
              href="#"
              class="list-group-item list-group-item-action"
              ><i class="fa-solid fa-dolly"></i> Pesanan</a
            >
            <a
              href="{{route('dashboard-accounts')}}"
              class="list-group-item list-group-item-action {{(request()->is('user/account*'))?'active':''}}"
              ><i class="bi bi-person-circle"></i> Akun</a
            >
          </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
          <nav
            class="navbar navbar-store navbar-expand-lg navbar-light fixed-top"
            data-aos="fade-down"
          >
            <button
              class="btn btn-secondary d-md-none mr-auto mr-2"
              id="menu-toggle"
            >
              &laquo; Menu
            </button>

            <button
              class="navbar-toggler"
              type="button"
              data-toggle="collapse"
              data-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto d-none d-lg-flex">
                <li class="nav-item dropdown">
                  <a
                    class="nav-link"
                    href="#"
                    id="navbarDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                  >
                    <img
                      src="/images/user.png"
                      alt=""
                      class="rounded-circle mr-2 profile-picture"
                    />
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('home')}}"
                      >Beranda</a
                    >
                    <div class="dropdown-divider"></div>
                      <form action="/logout" method="POST">
                        @csrf
                          <button class="dropdown-item text-danger">Logout  <i class="bi bi-box-arrow-right  text-danger "></i></button>
                      </form>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-inline-block mt-2" href="{{route('cart')}}">
                  @php
                      $carts = \App\Models\Cart::where('user_id',Auth::user()->id)->count();
                  @endphp
                  @if ($carts > 0)
                    <img src="/images/icon-cart-filled.svg" alt="" />
                    <div class="cart-badge">{{$carts}}</div>
                  @else
                    <img src="/images/icon-cart-empty.svg" alt="" />
                  @endif
                  </a>
                </li>
              </ul>

              <!-- Mobile Menu -->
              <ul class="navbar-nav d-block d-lg-none mt-3">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{route('home')}}"
                      >Beranda</a
                    >
                </li>
                <li class="nav-item">
                    <form action="/logout" method="POST">
                      @csrf
                        <button class="dropdown-item text-danger">Logout  <i class="bi bi-box-arrow-right  text-danger "></i></button>
                    </form>
                </li>
                <li class="nav-item">
                  <a class="nav-link d-inline-block" href="#">
                    <img src="/images/icon-cart-empty.svg" alt="" />
                  </a>
                </li>
              </ul>
            </div>
          </nav>
          {{-- Content--}}
          @yield('content')
        </div>
        <!-- /#page-content-wrapper -->
      </div>
    </div>

    @include('includes.footer')


    @stack('prepend-script')
    <script src="/vendor/jquery/jquery.slim.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Menu Toggle Script -->
    <script>
      $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });
    </script>
    @stack('addon-script')
  </body>
</html>
