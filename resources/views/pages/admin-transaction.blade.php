@extends('layouts.admin-dashboard')

@section('title')
    Daftar Transaksi
@endsection

@section('content')
<!-- Section Content -->
<div
    class="section-content section-dashboard-home"
    data-aos="fade-up"
    >
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Produk</h2>
            <p class="dashboard-subtitle">
                Daftar produk
            </p>
        </div>
        <ul
            class="nav nav-pills mb-3"
            id="pills-tab"
            role="tablist"
          >
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                href="#tab-table1" data-toggle="tab"
                >Belum dibayar</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                href="#tab-table2" data-toggle="tab"
                >Diproses</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                href="#tab-table3" data-toggle="tab"
                >Dikirim</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                href="#tab-table4" data-toggle="tab"
                >Selesai</a
              >
            </li>
        </ul>
        <div class="dashboard-content mb-3">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="tab-content table-responsive">
                                    <div class="tab-pane active" id="tab-table1">
                                        <table id="myTable1" class="table table-hover scroll-horizontal-vertical w-100" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Pemesan</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Menu</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab-table2">
                                        <table id="myTable2" class="table table-hover scroll-horizontal-vertical w-100" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Pemesan</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Menu</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab-table3">
                                        <table id="myTable3" class="table table-hover scroll-horizontal-vertical w-100" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Pemesan</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Menu</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                    <div class="tab-pane" id="tab-table4">
                                        <table id="myTable4" class="table table-hover scroll-horizontal-vertical w-100" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Kode Transaksi</th>
                                                    <th>Pemesan</th>
                                                    <th>Total</th>
                                                    <th>Status</th>
                                                    <th>Menu</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
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
        // AJAX DataTable
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            $.fn.dataTable.tables({ visible: true, api: true }).columns.adjust();
        });

        function table(Table,search) {
            $(Table).DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id'},
                { data: 'code'},
                { data: 'user.full_name' },
                { data: 'total_price',
                  render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp.' )
                },
                { data: 'transaction_status' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
            }).search(search).draw();
        }

        table('#myTable1','PENDING');
        table('#myTable2','DIPROSES');
        table('#myTable3','DIKIRIM');
        table('#myTable4','SELESAI');

    </script>
@endpush