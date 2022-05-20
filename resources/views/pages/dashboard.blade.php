@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">
                <br />
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row  mt-4">
                <a class="btn col-md-6" href="{{route('dashboard-products')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Produk anda
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $products }}
                            </div>
                        </div>
                    </div>
                </a>
                <a class="btn col-md-6" href="{{route('dashboard-transaction')}}">
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="dashboard-card-title">
                                Total pesanan anda
                            </div>
                            <div class="dashboard-card-subtitle text-center">
                                {{ $pay+$onProcess+$sent+$done }}
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="row mt-3">
                <div class="col-md-3">
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
                </div>
                <div class="col-md-3">
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
                </div>
                <div class="col-md-3">
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
                </div>
                <div class="col-md-3">
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection