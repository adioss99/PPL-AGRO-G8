@extends('layouts.app')

@section('title')
  Cart
@endsection

@section('content')
{{-- delete --}}
<div class="modal fade" id="deleteCartModal" tabindex="-1" role="dialog" aria-labelledby="deleteCartModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteCartModalLabel">Hapus cart <i class="bi bi-exclamation-circle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin ingin menghapus produk ini dari cart?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="yesDelete btn btn-danger text-white" >Ya</a>
      </div>
    </div>
  </div>
</div>

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
      <div class="row product_data" data-aos="fade-up" data-aos-delay="100">
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
                <th scope="col">Jumlah</th>
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
                <td class="cart-product product_data mr-2" style="width: 20%" >
                  <form action="{{route('change_qty', $cart->id)}}" class="d-flex">
                    @csrf   
                    @if ($cart->qty == 1)
                        <button class="btn btn-secondary" disabled>-</button>
                    @else
                      <button
                      type="submit"
                      value="down"
                      name="change_to"
                      class="btn btn-secondary"
                      > -
                      </button>                    
                    @endif                       
                        <input
                            type="number"
                            value="{{$cart->qty}}"
                            name="qty"
                            style="width: 20%"
                            disabled>
                      @if($cart->qty == 9) <button class="btn btn-secondary" disabled> + </button> @else 
                        <button
                            type="submit"
                            value="up"
                            name="change_to"
                            class="btn btn-secondary">
                            +
                        </button>
                      @endif
                  </form>
                </td>
                @php
                    $totalRow += $cart->product->price * $cart->qty
                @endphp
                <td style="width: 20%;" >
                  <div class="product-title">{{Str::rupiah( $totalRow )}}</div>
                </td>
                <td style="width: 20%;">
                  <button class="btn btn-remove-cart" data-toggle="modal" data-target="#deleteCartModal"><i class="bi bi-trash3-fill"></i></button>
                  <form action="{{route('cart-delete',$cart->id)}}" method="POST">
                    @method('DELETE')
                    @csrf
                    <button class="finalDelete btn btn-remove-cart"  data-toggle="modal" id="deleteButtonConfirmation" hidden>
                      Hapus
                    </button>
                  </form>
                </td>
              </tr>
              @php $totalPrice += $totalRow @endphp
              @endforeach
            </tbody>
          </table>
          @php $ongkir = 0 @endphp
          @php $total = $ongkir + $totalPrice @endphp
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
      <form action="{{route('checkout')}}" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="shipping_price" value="{{$ongkir}}">
        <input type="hidden" name="total_price" value="{{$total}}">
        <div class="row mb-2" data-aos="fade-up" data-aos-delay="200">
          <div class="col-md-6">
            <div class="form-group">
              <label for="addressTwo">Penerima</label>
              <input
                type="text"
                class="form-control"
                id="addressTwo"
                aria-describedby="emailHelp"
                name="name"
                value="{{$user->full_name}}"
                required/>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mobile">No. Telepon</label>
                <input
                  type="text"
                  class="form-control"
                  id="mobile"
                  name="phone"
                  value="{{$user->phone_number}}"
                required/>
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
                name="address"
                value="{{$user->alamat }}"
              required/>
            </div>
          </div>
          <div class="col-md-6">
            <br>
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
              <div class="product-title text-success">{{Str::rupiah($total)}}</div>
              <div class="product-subtitle">Total</div>
            </div>
            <div class="col-8 col-md-3">
              <button
              type="submit"
              class="btn btn-success mt-4 px-4 btn-block"
              >
              Pesan Sekarang
              </button>
            </div>
          @endif
        </div>
      </form>
    </div>
  </section>
</div>
@endsection

@push('addon-script')
<script>
// delete script
  $(".yesDelete").click(function(){
    $(".finalDelete").click(); 
    return false;
  });
</script>
@endpush