@extends('layouts.app')

@section('content')

<div class="page-content page-auth">
    <div class="page-content page-auth" data-aos="fade-up">
        <div class="container">
            <div class="row align-items-center row-login">
                <div class="col-lg-6 text-center">
                    <img src="/images/login.png" alt="" class="w-50 mb-4 mb-lg-none">
                </div>
                    <div class="col-lg-5">
                    <h2> Login </h2>
                    @if(Session::has('error'))
                        <div class="alert alert-danger">
                        {{ Session::get('error')}}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="mt-3">
                        @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control w-75 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required  autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password" type="password" class="form-control w-75 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            
                            <button type="submit" class="btn btn-success btn-block w-75 mt-4">Masuk</button>
                            
                            <p class="mt-2 text-secondary text-muted">
                                <small>
                                    <i>Belum menjadi mitra kami?</i>
                                    <a class="text-primary pl-1 button text-decoration-none font-italic" href="{{ route('register') }}">Daftar</a>
                                </small>
                            </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
