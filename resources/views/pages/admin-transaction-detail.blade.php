@extends('layouts.admin-dashboard')

@section('title')
    Detail Transaksi
@endsection

@push('modal')
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateLabel">Update data transaksi <i class="fa-solid fa-square-pen"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Simpan Perubahan?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="yesSave btn btn-success text-white" >Ya</a>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="verifikasiModal" tabindex="-1" role="dialog" aria-labelledby="verifikasiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="verifikasiLabel">Verifikasi Pembayaran <i class="fa-solid text-success fa-money-bill-wave"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin untuk memverifikasi pembayaran pesanan {{ $transaction->code }}?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>        
        <form action="{{route('admin-transaction-update',$transaction->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
          <input type="text" name="transaction_status" value="DIPROSES" hidden>
          <button type="submit" class="btn btn-success text-white" >Ya</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endpush

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
                  <button type="button" class="btn btn-outline-success btn-block mt-3" data-toggle="modal" data-target="#verifikasiModal"><i class="fa-solid fa-hand-holding-dollar"></i> Verifikasi Pembayaran</button>
                </div>
                @endif
              </div>
              <hr>
              {{-- Informasi Pesanan --}}
              <form action="{{route('admin-transaction-update',$transaction->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-12 mt-2">
                    <h5>Informasi Pesanan</h5>
                  </div>
                    <div class="col-12 col-md-3">
                      <div class="product-title">Status Pesanan</div>
                      <div class="product-subtitle">
                          <select
                              name="transaction_status"
                              id="status"
                              class="form-control"
                              v-model="status">
                            <option value="{{$transaction->transaction_status	}}">
                              -{{$transaction->transaction_status	}}-</option>
                            <hr>
                            <option value="PENDING">PENDING</option>
                            <option value="DIPROSES">DIPROSES</option>
                            <option value="DIKIRIM">DIKIRIM</option>
                            <option value="DITERIMA">DITERIMA</option>
                          </select>
                      </div>
                    </div>
                    <div class="col-12 col-md-3">
                      <div class="product-title">Kode Resi</div>
                      <div class="product-subtitle">
                        <input type="text" class="form-control" name="resi" v-model="resi" value="{{$transaction->resi}}">        
                      </div>
                    </div>
                    <div class="col-12 col-md-3">
                      <div class="product-title">Diperbarui Pada</div>
                      <div class="product-subtitle">
                        @php
                          echo date('d-m-Y H:i',strtotime($transaction->updated_at));
                        @endphp      
                      </div>
                    </div>
                    <div class="col-12 col-md-3">                    
                      <button type="submit" class="btn finalSave btn-block btn-success px-5 mt-3 mr-3" hidden>Simpan</button>
                      @if(($transaction->transaction_status == "DITERIMA"))          
                        <div class="product-subtitle text-success mt-3">
                          Pesanan telah diterima  <i class="fa-solid fa-check text-success"></i>
                        </div>
                      @endif
                    </div>
                  </div>
                </form>
                <div class="row">
                  <div class="col-12 col-md-12">
                    <button class="btn btn-block btn-success px-5 mt-3 mr-3"  data-toggle="modal" data-target="#updateModal"><i class="fa-solid fa-check"></i> Simpan</button>
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
// delete script
  $(".yesSave").click(function(){
    $(".finalSave").click(); 
    return false;
  });
</script>
@endpush