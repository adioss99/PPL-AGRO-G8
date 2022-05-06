

@extends('layouts.dashboard')

@section('title')
Dashboard Produk
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Produk</h2>
            <p class="dashboard-subtitle">
                <br />
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row mt-4">
                @foreach ($products  as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                    <a class="card card-dashboard-product d-block" href="{{route('dashboard-products-details-view',$product ->id)}}">
                        <div class="card-body">
                            <img src="{{Storage::url($product->galleries->first()->photos ??'')}}" alt="" class="w-100 mb-2 rounded" />
                            <div class="product-title">{{$product->name}}</div>
                            <div class="product-subtitle text-success"><small>{{Str::rupiah($product->price)}}</small></div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection