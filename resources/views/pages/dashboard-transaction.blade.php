@extends('layouts.dashboard')

@section('title')
    Transaksi
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
      <h2 class="dashboard-title">Pesanan</h2>
      <p class="dashboard-subtitle">
        Daftar pesanan
      </p>
    </div>
    <div class="dashboard-content">
      <div class="row">
        <div class="col-12 mt-2">
          <ul
            class="nav nav-pills mb-3"
            id="pills-tab"
            role="tablist"
          >
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                id="pills-pay-tab"
                data-toggle="pill"
                href="#pills-pay"
                role="tab"
                aria-controls="pills-pay"
                aria-selected="true"
                >Belum Dibayar</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="pills-home-tab"
                data-toggle="pill"
                href="#pills-home"
                role="tab"
                aria-controls="pills-home"
                aria-selected="true"
                >Diproses</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="pills-sent-tab"
                data-toggle="pill"
                href="#pills-sent"
                role="tab"
                aria-controls="pills-sent"
                aria-selected="false"
                >Dikirim</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="pills-done-tab"
                data-toggle="pill"
                href="#pills-done"
                role="tab"
                aria-controls="pills-done"
                aria-selected="false"
                >Selesai</a
              >
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div
              class="tab-pane fade show active"
              id="pills-pay"
              role="tabpanel"
              aria-labelledby="pills-pay-tab"
            >
              @foreach ($pay as $pay)
                  <a
                    href="{{route('transaction-detail',$pay->id)}}"
                    class="card card-list d-block"
                  >
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2">                          
                            {{ $pay->code }}
                        </div>
                        <div class="col-md-3">
                            {{Str::rupiah($pay->total_price)}}
                        </div>
                        <div class="col-md-3">
                          @php
                            echo date('d-m-Y H:i',strtotime($pay->created_at));
                          @endphp   
                        </div>
                        <div class="col-md-3">
                            {{ $pay->transaction_status}}
                        </div>
                        <div class="col-md-1 text-right d-none d-md-block">
                          <img
                            src="/images/dashboard-arrow-right.svg"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                  </a>
              @endforeach
            </div>
            <div
              class="tab-pane fade"
              id="pills-home"
              role="tabpanel"
              aria-labelledby="pills-home-tab"
            >
              @foreach ($onProcess as $process)
                  <a
                    href="{{route('transaction-detail',$process->id)}}"
                    class="card card-list d-block"
                  >
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2">                          
                            {{ $process->code }}
                        </div>
                        <div class="col-md-3">
                            {{Str::rupiah($process->total_price)}}
                        </div>
                        <div class="col-md-3">
                          @php
                            echo date('d-m-Y H:i',strtotime($process->created_at));
                          @endphp   
                        </div>
                        <div class="col-md-3">
                            {{ $process->transaction_status}}
                        </div>
                        <div class="col-md-1 text-right d-none d-md-block">
                          <img
                            src="/images/dashboard-arrow-right.svg"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                  </a>
              @endforeach
            </div>
            <div
              class="tab-pane fade"
              id="pills-sent"
              role="tabpanel"
              aria-labelledby="pills-sent"
            >
              @foreach ($sent as $sent)
                  <a
                    href="{{route('transaction-detail',$sent->id)}}"
                    class="card card-list d-block"
                  >
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2">                          
                            {{ $sent->code }}
                        </div>
                        <div class="col-md-3">
                            {{Str::rupiah($sent->total_price)}}
                        </div>
                        <div class="col-md-3">
                          @php
                            echo date('d-m-Y H:i',strtotime($process->created_at));
                          @endphp   
                        </div>
                        <div class="col-md-3">
                            {{ $sent->transaction_status}}
                        </div>
                        <div class="col-md-1 text-right d-none d-md-block">
                          <img
                            src="/images/dashboard-arrow-right.svg"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                  </a>
              @endforeach
            </div>
            <div
              class="tab-pane fade"
              id="pills-done"
              role="tabpanel"
              aria-labelledby="pills-done-tab"
            >
              @foreach ($done as $done)
                  <a
                    href="{{route('transaction-detail',$done->id)}}"
                    class="card card-list d-block"
                  >
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-2">                          
                            {{ $done->code }}
                        </div>
                        <div class="col-md-3">
                            {{Str::rupiah($done->total_price)}}
                        </div>
                        <div class="col-md-3">
                            {{ $done->created_at }}
                        </div>
                        <div class="col-md-3">
                            {{ $done->transaction_status}}
                        </div>
                        <div class="col-md-1 text-right d-none d-md-block">
                          <img
                            src="/images/dashboard-arrow-right.svg"
                            alt=""
                          />
                        </div>
                      </div>
                    </div>
                  </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection