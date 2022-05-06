
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
                  @if (auth()->user()->roles=="ADMIN")
                  src="/images/administrator.png"
                  @else
                  src="/images/user.png"
                  @endif
                  alt=""
                  class="rounded-circle mr-3 profile-picture"
                  />
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{route('dashboard')}}"
                  >Dashboard</a
                  >
                  <div class="dropdown-divider"></div>
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="dropdown-item text-danger">Logout  <i class="bi bi-box-arrow-right  text-danger "></i></button>
                    </form>
                  </div>
                </li>
                @if (auth()->user()->roles=="USER")
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
                @endif
              </ul>
                    <!-- Mobile Menu -->
              <ul class="navbar-nav d-lg-none mt-3">
                <li class="nav-item">
                    <a class="dropdown-item" href="{{route('dashboard')}}"
                      >Dashboard</a>
                </li>
                <li class="nav-item">
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item text-danger">Logout  <i class="bi bi-box-arrow-right  text-danger "></i></button>
                  </form>
                </li>
                @if (auth()->user()->roles=="USER")
                <li class="nav-item">
                  <a class="nav-link d-inline-block mt-2" href="#">
                      <img src="/images/icon-cart-empty.svg" alt="" />
                  </a>
                </li>
          @endif
        </ul>
      </div>
  </div>