@extends('layouts.admin-dashboard')

@section('title')
    Tambah Produk
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Tambah Produk</h2>
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
                    <form action="{{route('dashboard-products-store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Pemilik</label>
                                            <select name="users_id" class="form-control">
                                                @foreach ($users as $user)
                                                    <option value="{{$user->id}}">{{ $user -> full_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Nama Produk</label>
                                            <input type="text" class="form-control" id="name" aria-describedby="name" name="name"required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="price">Harga</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1">Rp</span>
                                                <input type="number" class="form-control" id="price" aria-describedby="price" name="price"required/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="weight">Berat</label>
                                            <div class="input-group mb-3">
                                                <input type="number" class="form-control" id="weight" aria-describedby="weight" name="weight"required/>
                                                <span class="input-group-text" id="basic-addon">kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="description">Deskripsi</label>
                                            <textarea name="description" class="form-control"required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Thumbnails</label>
                                            <input type="file" name="photo" class="form-control" required/>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-right">
                                        <a class="btn btn-secondary mr-1 text-white px-5" href="{{route('product.index')}}">Batal</a>
                                        <button type="submit" class="btn btn-success px-5">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection