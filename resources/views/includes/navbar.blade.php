<nav class="navbar navbar-expand-lg navbar-light navbar-store fixed-top navbar-fixed-top" data-aos="fade-down">
    <div class="container">
    <a href="{{route('home')}}" class="navbar-brand">
        <img src="/images/logoland.svg" alt="logo" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        @guest
        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a href="{{route ('home')}}" class="nav-link">Beranda</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register')}}" class="nav-link">Daftar</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('login')}}" class="btn nav-link px-4 text-white" style="background-color: #29A867">Masuk</a>
            </li>
        </ul>
            @endguest
        @auth
            @include('includes.navbar-auth')
        @endauth
    </div>
    </div>
</nav>