@extends('layouts.admin-dashboard')

@section('title')
Product list
@endsection

@section('content')
{{-- delete --}}
<div class="modal fade" id="deleteProductModal" tabindex="-1" role="dialog" aria-labelledby="deleteProductModalLabel" aria-hidden="true" data-backdrop="false" style="background-color: rgba(0, 0, 0, 0.5);">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteProductModalLabel">Hapus Produk <i class="bi bi-exclamation-circle text-danger"></i></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Yakin untuk menghapus produk ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a type="button" class="yesDelete btn btn-danger text-white" >Ya</a>
      </div>
    </div>
  </div>
</div>
@include('sweetalert::alert')
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
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{  route('dashboard-products-create') }}" class="btn btn-primary mb-3">
                                + Tambah produk
                            </a>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Pemilik</th>
                                        <th>Menu</th>
                                    </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'price',
                  render: $.fn.dataTable.render.number( '.', ',', 0, 'Rp.' )
                },
                { data: 'user.full_name', name: 'user.full_name' },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '15%'
                },
            ]
        });
    </script>
    <script>
        // modal style
        $('.modal').click(function(event){
            $(event.target).modal('hide');
        });
    </script>
    <script>
        // delete script
        $(".yesDelete").click(function(){
            $(".finalDelete").click(); 
            return false;
        });
        </script>
@endpush


{{-- <form action="' . route('product.destroy', $item->id) . '" method="POST">
    ' . method_field('delete') . csrf_field() . '
    <button type="button" class="dropdown-item text-danger">
        Hapus   <i class="bi bi-trash3-fill" ></i>
    </button>
</form> --}}