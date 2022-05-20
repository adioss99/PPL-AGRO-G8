@extends('layouts.dashboard')

@section('title')
    Detail Produk
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
        <p>Anda harus menghubungi admin untuk mengedit data produk</p>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-success"href="https://wa.me/+628113780510?text=*Edit%20Produk*%0Aid%20produk%3A%20{{$product->id}}%20" target="_blank">Hubungi Admin <i class="fa-brands fa-whatsapp"></i></a>
      </div>
    </div>
  </div>
</div>
@endpush

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">Detail Produk</h2>
    </div>   
    <div class="row mt-4">
      <div class="page-details">
        <section class="store-gallery mb-3" id="gallery">
          <div class="container">
            <button
                data-toggle="modal" data-target="#exampleModal"
                class="btn btn-success mt-4"
                ><i class="bi bi-pencil-square"></i> Edit Produk
            </button>
            <div class="row mt-4">
              <div class="col-lg-8" data-aos="zoom-in">
                <transition name="slide-fade" mode="out-in">
                  <img 
                  :key="photos[activePhoto].id" 
                  :src="photos[activePhoto].url" 
                  class="w-100 main-image" alt="" />
                </transition>
              </div>
              <div class="col-lg-2">
                <div class="row">
                  <div class="col-3 col-lg-12 mt-2 mt-lg-0" v-for="(photo, index) in photos" :key="photo.id" data-aos="zoom-in" data-aos-delay="100">
                    <a href="#" @click="changeActive(index)">
                      <img :src="photo.url" class="w-100 thumbnail-image" :class="{ active: index == activePhoto }" alt="" />
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="store-details-container" data-aos="fade-up">
          <section class="store-heading">
            <div class="container">
              <div class="row">
                <div class="col-lg-8">
                  <h1>{{$product->name}}</h1>
                  <div class="price">{{Str::rupiah($product->price)}}</div>
                </div>
                <div class="col-lg-2" data-aos="zoom-in">
                  <form action="{{route('cart-add',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <button
                      type="submit"
                      class="btn btn-success px-4 text-white btn-block mb-3"
                    >
                      Add to Cart
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </section>
          <section class="store-description">
            <div class="container mb-3">
              <div class="row">
                <div class="col-12 col-lg-8">
                  Berat Produk: {{$product->weight}} Kg <br>
                  {!! $product->description !!}
                </div>
              </div>
            </div>
          </section>
        </div>
      </div>           
    </div>
  </div>
</div>
@endsection

@push('addon-script')
    <script src="/vendor/vue/vue.js"></script>
    <script>
      var gallery = new Vue({
        el: '#gallery',
        mounted() {
          AOS.init();
        },
        data: {
          activePhoto: 0,
          photos: [
            @foreach ($product->galleries as $gallery)
            {
              id: {{ $gallery->id }},
              url: "{{ Storage::url($gallery->photos) }}",
            },
            @endforeach
          ],
        },
        methods: {
          changeActive(id) {
            this.activePhoto = id;
          },
        },
      });
    </script>
    <script src="/script/navbar-scroll.js"></script>
@endpush