@extends('layouts.admin-dashboard')

@section('title')
    Dashboard Admin
@endsection

@section('content')
@include('sweetalert::alert')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard Admin</h2>
            <p class="dashboard-subtitle">
                <br />
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row  mt-4">
                <a class="btn col-md-6" href="{{route('user.index')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Jumlah Pelanggan 
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $cust }}
                            </div>
                        </div>
                    </div>
                </a>
                <a class="btn col-md-6" href="{{route('product.index')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Total produk 
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $products }}
                            </div>
                        </div>
                    </div>
                </a>
                {{-- <a class="btn col-md-4" href="{{route('admin-transaction')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Total pesanan 
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $pay+$onProcess+$sent+$done }}
                            </div>
                        </div>
                    </div>
                </a> --}}
            </div>
            <div class="row mt-3">
                <a class="btn col-md-3" href="{{route('admin-transaction')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Pesanan belum dibayar
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $pay }}
                            </div>
                        </div>
                    </div>
                </a>
                <a  class="btn col-md-3" href="{{route('admin-transaction')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Pesanan sedang diproses
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $onProcess }}
                            </div>
                        </div>
                    </div>
                </a>
                <a  class="btn col-md-3" href="{{route('admin-transaction')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Pesanan sedang dikirim
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $sent }}
                            </div>
                        </div>
                    </div>
                </a>
                <a  class="btn col-md-3" href="{{route('admin-transaction')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Pesanan selesai
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $done }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection