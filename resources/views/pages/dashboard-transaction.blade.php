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
                id="pills-ship-tab"
                data-toggle="pill"
                href="#pills-ship"
                role="tab"
                aria-controls="pills-ship"
                aria-selected="false"
                >Dikirim</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="pills-profile-tab"
                data-toggle="pill"
                href="#pills-profile"
                role="tab"
                aria-controls="pills-profile"
                aria-selected="false"
                >Selesai</a
              >
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div
              class="tab-pane fade show active"
              id="pills-home"
              role="tabpanel"
              aria-labelledby="pills-home-tab"
            >
              @foreach ($onProcess as $process)
                  <a
                    href="#"
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
                            {{ $process->created_at }}
                        </div>
                        <div class="col-md-3">
                            {{ $process->transaction_status}}
                        </div>
                        <div class="col-md-1 text-right d-none d-md-block">
                          <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                      </div>
                    </div>
                  </a>
              @endforeach
            </div>
            <div
              class="tab-pane fade"
              id="pills-ship"
              role="tabpanel"
              aria-labelledby="pills-ship"
            >
              @foreach ($sent as $sent)
                  <a
                    href="#"
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
                            {{ $sent->created_at }}
                        </div>
                        <div class="col-md-3">
                            {{ $sent->transaction_status}}
                        </div>
                        <div class="col-md-1 text-right d-none d-md-block">
                          <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </div>
                      </div>
                    </div>
                  </a>
              @endforeach
            </div>
            <div
              class="tab-pane fade"
              id="pills-profile"
              role="tabpanel"
              aria-labelledby="pills-profile-tab"
            >
              @foreach ($done as $done)
                  <a
                    href="#"
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
                          <i class="fa-solid fa-arrow-right-from-bracket"></i>
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