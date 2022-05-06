@extends('layouts.app')

@section('title')
  Cart
@endsection

@section('content')
    <div class="page-content page-cart">
      <section
        class="store-breadcrumbs"
        data-aos="fade-down"
        data-aos-delay="100"
      >
        <div class="container">
          <div class="row">
            <div class="col-12">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="/">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Cart
                  </li>
                  @include('sweetalert::alert')
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>
      <section class="store-cart">
        <div class="container">
          <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-12 table-responsive">
              <table
                class="table table-borderless table-cart"
                aria-describedby="Cart"
              >
                <thead>
                  <tr>
                    <th scope="col">Gambar</th>
                    <th scope="col">Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Jml</th>
                    <th scope="col">Total</th>
                    <th scope="col">Menu</th>
                  </tr>
                </thead>
                <tbody>
                  @php $totalPrice = 0 @endphp
                  @foreach ($carts as $cart)
                  @php $totalRow = 0 @endphp
                  <tr>
                    <td style="width: 20%;">
                      <img
                      src="{{Storage::url($cart->product->galleries->first()->photos)}}"
                      alt=""
                      class="cart-image w-35"
                      />
                    </td>
                    <td style="width: 20%;">
                      <div class="product-title">{{ $cart->product->name }}</div>
                    </td>
                    <td style="width: 20%;">
                      <div class="product-title">{{Str::rupiah( $cart->product->price )}}</div>
                    </td>
                    <td class="cart-product-quantity mr-3" style="width: 15%" >
                      <div class="product-title">{{ $cart->qty }}</div>
                    </td>
                    {{-- er --}}
                    <td style="width: 25%;" >
                      <div class="product-title">{{Str::rupiah( $cart->product->price )}}</div>
                    </td>
                    <td style="width: 20%;">
                      <form action="{{route('cart-delete',$cart->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-remove-cart">
                          Hapus
                        </button>
                      </form>
                    </td>
                  </tr>
                  @php $totalPrice += $cart->product->price @endphp
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="row" data-aos="fade-up" data-aos-delay="150">
            <div class="col-12">
              <hr />
              <div class="text-right">
                <a href="{{route('dashboard-products')}}" class="btn btn-outline-success px-3 mb-1"data-aos="fade-up" data-aos-delay="200">Daftar Produk</a>
              </div>
            </div>
            <div class="col-12">
              <h2 class="mb-4">Detail Pengiriman</h2>
            </div>
          </div>
          <form action="">
            <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="addressTwo">Penerima</label>
                  <input
                    type="text"
                    class="form-control"
                    id="addressTwo"
                    aria-describedby="emailHelp"
                    name="addressTwo"
                    value="{{$user->full_name}}"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="mobile">No. Telepon</label>
                    <input
                      type="text"
                      class="form-control"
                      id="mobile"
                      name="mobile"
                      value="{{$user->phone_number}}"
                    />
                  </div>
                </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="addressOne">Alamat</label>
                  <input
                    type="text"
                    class="form-control"
                    id="addressOne"
                    aria-describedby="emailHelp"
                    name="addressOne"
                    value="{{$user->alamat }}"
                  />
                </div>
              </div>
              <div class="col-md-6">
                <br>
                {{-- <div class="form-group">
                  <label for="postalCode">Kode POS</label>
                  <input
                    type="text"
                    class="form-control"
                    id="postalCode"
                    name="postalCode"
                    value=""
                  />
                </div> --}}
              {{-- </div>
              <div class="col text-right mt-1"> --}}
                <a href="#" class="btn btn-outline-success ">    
                  Custom Packing <i class="bi bi-whatsapp" style="font-size: 15px;"></i>
                </a>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="150">
              <div class="col-12">
                <hr />
              </div>
              <div class="col-12">
                <h2>Informasi Pembayaran</h2>
              </div>
            </div>
            <div class="row" data-aos="fade-up" data-aos-delay="200">    
              <div class="col-4 col-md-2"></div>
              <div class="col-4 col-md-3"></div>
              <div class="col-4 col-md-2">
                @php $ongkir = 100000 @endphp
                <div class="product-title">{{Str::rupiah($ongkir)}}</div>
                <div class="product-subtitle">Ongkir</div>
              </div>
              <div class="col-4 col-md-2">
                @if ($totalPrice == 0)
                  <div class="product-title text-success">{{Str::rupiah(0)}}</div>                    
                  <div class="product-subtitle">Total</div>
                </div>
                  <div class="col-8 col-md-3">
                  <button
                  href="#"
                  class="btn btn-success mt-4 px-4 btn-block"
                  disabled>
                  Pesan Sekarang
                  </button>
                </div>
                @else                    
                  <div class="product-title text-success">{{Str::rupiah( $ongkir + $totalPrice)}}</div>
                  <div class="product-subtitle">Total</div>
                </div>
                <div class="col-8 col-md-3">
                  <a
                  href="#"
                  class="btn btn-success mt-4 px-4 btn-block"
                  >
                  Pesan Sekarang
                  </a>
                </div>
              @endif
            </div>
          </form>
        </div>
      </section>
    </div>
@endsection

@push('addon-script')
{{-- <script>
  $(document).ready(function(){
     $('.increment-btn').click(function (e) {
         e.preventDefault();
         var incre_value = $(this).parents('.quantity').find('.qty-input').val();
         var value = parseInt(incre_value, 10);
         value = isNaN(value) ? 0 : value;
         if(value<10){
             value++;
             $(this).parents('.quantity').find('.qty-input').val(value);
         }
     });

     $('.decrement-btn').click(function (e) {
         e.preventDefault();
         var decre_value = $(this).parents('.quantity').find('.qty-input').val();
         var value = parseInt(decre_value, 10);
         value = isNaN(value) ? 0 : value;
         if(value>1){
             value--;
             $(this).parents('.quantity').find('.qty-input').val(value);
         }
     });
});
</script> --}}
@endpush