@extends('layouts.admin-dashboard')

@section('title')
    Detail Transaksi
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid mb-5">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">{{ $transaction->code }}</h2>
      <p class="dashboard-subtitle">                       
        @php
          echo 'Tanggal Pemesanan: '.date('d-m-Y H:i',strtotime($transaction->created_at));
        @endphp      
      </p>
    </div>
    <div class="dashboard-content" id="transactionDetails">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              @php
                  $weight = 0;
              @endphp
              @foreach ($detail as $detail)
              <div class="row">
                <div class="col-12 col-md-3">
                  <img
                    src="{{ Storage::url($detail->product->galleries->first()->photos ?? '') }}"
                    class="w-100 rounded mb-3"
                    alt=""
                  />
                </div>
                <div class="col-12 col-md-9">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Nama Produk</div>
                      <div class="product-subtitle">{{ $detail->product->name }}</div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Id Produk
                      </div>
                      <div class="product-subtitle">
                        {{ $detail->product->id }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Berat Produk</div>
                      <div class="product-subtitle">
                        {{ $detail->product->weight }} Kg
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Harga Produk</div>
                      <div class="product-subtitle">
                        {{Str::rupiah($detail->product->price)}}
                      </div>
                    </div>
                    <div class="col-12 col-md-12">
                      <div class="product-title">Deskripsi Produk</div>
                      <div class="product-subtitle">
                        {!!$detail->product->description!!}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">
                        Jumlah
                      </div>
                      <div class="product-subtitle">
                        {{ $detail->qty }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">Total</div>
                      <div class="product-subtitle text-danger">
                        @php
                            $total = $detail->qty * $detail->product->price;
                        @endphp
                        {{Str::rupiah($total)}}
                      </div>
                    </div>
                  </div>
                </div>                      
              </div>
                @php
                    $weight += $detail->qty * $detail->product->weight;
                @endphp
              <hr>
              @endforeach
              {{-- Informasi Pengiriman --}}
              <div class="row">
                <div class="col-12 mt-2">
                  <h5>Informasi Pengiriman</h5>
                </div>
                <div class="col-12">
                  <div class="row">
                    <div class="col-12 col-md-6">
                      <div class="product-title">Penerima</div>
                      <div class="product-subtitle">
                        {{ $transaction->name }}
                      </div>
                    </div>
                    <div class="col-12 col-md-6">
                      <div class="product-title">No. Telp</div>
                      <div class="product-subtitle">
                        {{ $transaction->phone }}
                      </div>
                    </div>
                    <div class="col-12 col-md-12">
                      <div class="product-title">Alamat</div>
                      <div class="product-subtitle">
                          {{ $transaction->address }}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <hr>
              {{-- Informasi Pembayaran --}}
              <div class="row">
                <div class="col-12 mt-2">
                  <h5>Informasi Pembayaran</h5>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Total</div>
                  <div class="product-subtitle text-danger">
                        {{Str::rupiah($transaction->total_price)}}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Total Berat</div>
                  <div class="product-subtitle">
                      {{ $weight }}Kg
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Status Pembayaran</div>
                  <div class="product-subtitle">
                    @if ($transaction->transaction_status == "PENDING")
                        BELUM DIBAYAR
                    @else
                      <div class="text-success">
                        Pembayaran Berhasil <i class="fa-solid fa-check text-success"></i>
                      </div>
                    @endif
                  </div>
                </div>
                @if ($transaction->transaction_status == "PENDING")
                <div class="col-12 col-md-3">
                  <button type="button" class="btn btn-outline-success btn-block mt-3" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-hand-holding-dollar"></i> Verifikasi Pembayaran</button>
                </div>
                @endif
              </div>
              <hr>
              {{-- Informasi Pesanan --}}
              <div class="row">
                <div class="col-12 mt-2">
                  <h5>Informasi Pesanan</h5>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Status Pembayaran</div>
                  <div class="product-subtitle">
                      {{ $transaction->transaction_status }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Status Pesanan</div>
                  <div class="product-subtitle">
                      {{ $transaction->transaction_status }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Kode Resi</div>
                  @if ($transaction->resi != " ")
                    <p class="product-subtitle" id="resi">
                      {{$transaction->resi }} <button class="btn btn-white fa-xs" onclick="copyToClipboard('#resi')"><i class="fa-solid fa-copy"></i></button>
                    </p>                      
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div> 
@endsection

@push('addon-script')
    <script>
      function copyToClipboard(element) {
        var $temp = $("<input>");
        $("body").append($temp);
        $temp.val($(element).text()).select();
        document.execCommand("copy");
        $temp.remove();
      }
    </script>
@endpush