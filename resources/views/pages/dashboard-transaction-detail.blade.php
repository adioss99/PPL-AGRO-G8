@extends('layouts.dashboard')

@section('title')
    Detail Transaksi
@endsection

@push('modal')
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran <i class="fa-solid fa-building-columns"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>
          Lakukan Pembayaran dengan mentransfer pada rekening berikut 
        </h6>
        <div id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                  Bank BRI (002)
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                <h6>a.n: Hendra Hermawan <br> No.Rek: 21432321342</h6>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">                  
                  Bank BCA (014)
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                <h6>a.n: Hendra Hermawan <br> No.Rek: 45645443214</h6>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">                  
                  Bank BNI (009)
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                <h6>a.n: Hendra Hermawan <br> No.Rek: 46451342</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="https://wa.me/628113780510?text=-Pembayaran-%0AKode%3A%20'{{$transaction->code}}" target="_blank" type="button" class="btn btn-success"> <i class="fa-brands fa-whatsapp"></i> Konfirmasi Pembayaran</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verifikasiLabel">Terima Pesanan <i class="fa-solid fa-clipboard-check"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin telah menerima pesanan {{ $transaction->code }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>        
        <form action="{{route('transaction-update',$transaction->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="text" name="transaction_status" value="DITERIMA" hidden>
          <button type="submit" class="btn btn-success text-white" >Ya</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endpush

@section('content')
<!-- Section Content -->
@include('sweetalert::alert')
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
              <hr>
                @php
                    $weight += $detail->qty * $detail->product->weight;
                @endphp
              @endforeach
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
                  <button type="button" class="btn btn-outline-success btn-block mt-3" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-hand-holding-dollar"></i> Bayar</button>
                </div>
                @endif
              </div>
              <hr>
              <div class="row">
                <div class="col-12 mt-2">
                  <h5>Informasi Pesanan</h5>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Status Pesanan</div>
                  <div class="product-subtitle">
                      {{ $transaction->transaction_status }}
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Kode Resi</div>
                    <p class="product-subtitle" id="resi">
                      {{$transaction->resi }} <button class="btn btn-white fa-xs" onclick="copyToClipboard('#resi')"><i class="fa-solid fa-copy"></i></button>
                    </p>         
                </div>
                <div class="col-12 col-md-3">
                  <div class="product-title">Diperbarui Tanggal</div>
                  <div class="product-subtitle">
                    @php
                      echo date('d-m-Y H:i',strtotime($transaction->updated_at));
                    @endphp      
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  @if ($transaction->transaction_status == "DIKIRIM")
                    <button type="button" class="btn btn-success px-5 mt-3 mr-3" data-toggle="modal" data-target="#verifikasiModal"><i class="fa-solid fa-box-open"></i> Terima</button>
                  @elseif(($transaction->transaction_status == "DITERIMA"))          
                    <div class="product-subtitle text-success mt-3">
                      Pesanan telah diterima  <i class="fa-solid fa-check text-success"></i>
                    </div>
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