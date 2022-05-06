<div class="page-content page-success">
  <div class="section-success" data-aos="zoom-in">
    <div class="container">
      <div class="row align_items-center row-login justify-content-center">
        <div class="col-lg-6 text-center">
          <img src="/images/success.svg" alt="" class="mb-4" />
          <h2>Selamat datang di toko</h2>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi, obcaecati!</p>
          <div>
            <a href="/dasboard.html" class="btn btn-success w-50 MT-4">My Dashboard</a>
            <a href="/index.html" class="btn btn-signup w-50 MT-2">Shop</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>@yield('title')</title>

    <!-- style -->
    @stack('prepend-style')
    @include('includes.style')
    @stack('addon-style')
    
    </head>

  <body>
    <!-- navbar -->
    @include('includes.navbar')

    {{-- page content --}}
    @yield('content')

    <!-- footer -->
    @include('includes.footer')
    
    <!-- Bootstrap core JavaScript -->
    @stack('prepend-script')
    @include('includes.script')
    @stack('addon-script')
  </body>
</html>
