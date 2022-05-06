@extends('layouts.app')

@section('content')
<div class="page-content page-auth" id="register" style="">
    <div class="section-store-auth">
      <div class="container">
        <div class="row align-items-center justify-content-center row-login">
            <div class="col-lg-5">
            <h2>Mari menjadi mitra kami</h2>
            <!-- form -->
            <form action="/register" class="mt-3" method="POST">
                @csrf
                <div class="form-group">
                    <label >Nama Lengkap</label>
                    <input type="text" name="full_name"class="form-control w-75 @error('full_name') is-invalid @enderror" autocomplete="full_name" required value="{{old('full_name')}}"/>
                    @error('full_name')
                        <div class="invalid-feedback"role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat"class="form-control w-75 @error('alamat') is-invalid @enderror"autocomplete="alamat"   required value="{{old('alamat')}}"/>
                    @error('alamat')
                        <div class="invalid-feedback"role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Nomor telepon</label>
                    <input type="text" name="phone_number"class="form-control w-75 @error('phone_number') is-invalid @enderror" autocomplete="phone_number"  required value="{{old('phone_number')}}"/>
                    @error('phone_number')
                        <div class="invalid-feedback"role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"class="form-control w-75 @error('email') is-invalid @enderror" v-model="email" required value="{{old('email')}}" placeholder="name@example.com"autocomplete="email"/>
                    @error('email')
                        <div class="invalid-feedback"role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="form-group mt-4">
                    <label>Password</label>
                    <input type="password" name="password"class="form-control w-75 @error('password') is-invalid @enderror"  required autocomplete="new-password"/>
                    @error('password')
                        <div class="invalid-feedback"role="alert">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-success btn-block w-75 mt-4" type="submit">Daftar</button>
            </form>
                <p class="mt-2 text-secondary text-muted">
                    <small>
                        <i>Sudah punya akun?</i>
                        <a class="text-primary pl-1 button text-decoration-none font-italic" href="{{ route('login') }}">Masuk</a>
                    </small>
                </p>
            </div>
        </div>
      </div>
    </div>
</div>

{{-- <div class="container " style="display: none" >
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required value="{{old('')}}" autocomplete="name" autocomplete="additional-name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required value="{{old('')}}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{old('')}}" autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required value="{{old('')}}" autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
