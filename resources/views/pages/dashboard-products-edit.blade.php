@extends('layouts.admin-dashboard')

@section('title')
    Dashboard Produk
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Edit Produk</h2>
            <br>
        {{-- <p class="dashboard-subtitle">Detail produk</p> --}}
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <form action="{{route('dashboard-products-update',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Pemilik</label>
                                        <select name="users_id" class="form-control" >
                                            <option value="{{$product->users_id}}">{{ $product -> user -> full_name}}</option>
                                            @foreach ($users as $user)
                                                <option value="{{$user->id}}">{{ $user -> full_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" class="form-control" id="name" aria-describedby="name" name="name" value="{{$product->name}}"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price">Harga</label>
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="basic-addon1">Rp</span>
                                            <input type="number" class="form-control" id="price" aria-describedby="price" name="price" value="{{$product->price}}"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="weight">Berat</label>
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" id="weight" aria-describedby="weight" name="weight" value="{{$product->weight}}"/>
                                            <span class="input-group-text" id="basic-addon">Kg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea name="description" class="form-control">{!! $product->description !!}</textarea>
                                    </div>
                                </div>
                                <div class="row pl-3">
                                    <div class="col text-right">
                                        <button type="submit" class="btn btn-success btn-block px-5">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                    <div class="row">
                        @foreach ($product->galleries as $gallery)
                        <div class="col-md-4">
                            <div class="gallery-container">
                                <img
                                    src="{{ Storage::url($gallery->photos ?? '') }}"
                                    alt=""
                                    class="w-100 rounded"
                                />
                                <a href="{{ route('dashboard-products-gallery-delete', $gallery->id) }}" class="delete-gallery">
                                    <img src="/images/icon-delete.svg" alt="" />
                                </a>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12">
                            <form action="{{ route('dashboard-products-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="products_id">
                                <input
                                type="file"
                                name="photos"
                                id="file"
                                style="display: none;"
                                multiple
                                onchange="form.submit()"
                                />
                                <button
                                type="button"
                                class="btn btn-secondary btn-block mt-3"
                                onclick="thisFileUpload()"
                                >
                                Add Photo
                                </button>
                            </form>
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
$('.simpan').click(function(){
    swal({
        title: "Yakin?",
        text: "Once deleted, you will not be able to recover this imaginary file!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            swal("Poof! Your imaginary file has been deleted!", {
            icon: "success",
            });
        } else {
            swal("Your imaginary file is safe!");
        }
        });
})
</script>
@endpush