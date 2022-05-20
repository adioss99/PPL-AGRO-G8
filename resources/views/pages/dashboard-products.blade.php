

@extends('layouts.dashboard')

@section('title')
    Produk
@endsection

@push('modal')
{{-- Chat WA --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Custom Packing</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Anda harus menghubungi admin untuk menambahkan produk baru</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-success"href="https://wa.me/+628113780510?text=*Request%20Produk*%0Aid%20pelanggan%3A%20{{auth()->user()->id}}%20" target="_blank">Hubungi Admin <i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </div>
  </div>
</div>
@endpush

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Produk</h2>
            <p class="dashboard-subtitle">
                <br>
            </p>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
                <button
                    data-toggle="modal" data-target="#exampleModal"
                    class="btn btn-success"
                    ><i class="fa-solid fa-plus"></i> Request Produk</button
                >
                </div>
            </div>
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