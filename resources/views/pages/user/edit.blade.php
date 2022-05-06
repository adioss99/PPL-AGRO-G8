@extends('layouts.admin-dashboard')

@section('title')
  Edit user
@endsection

@section('content')
<!-- Section Content -->
<div
  class="section-content section-dashboard-home"
  data-aos="fade-up"
>
  <div class="container-fluid">
    <div class="dashboard-heading">
        <h2 class="dashboard-title">User</h2>
        <p class="dashboard-subtitle">
            Edit roles user
        </p>
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
          <form action="{{ route('user.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Nama User</label>
                      <input type="text" class="form-control" name="" value="{{ $item->full_name }}" disabled />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Email User</label>
                      <input type="text" class="form-control" name="" value="{{ $item->email }}" disabled />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>No.HP</label>
                      <input type="text" class="form-control" name="" value="{{ $item->phone_number }}" disabled />
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Alamat</label>
                      <input type="text" class="form-control" name="" value="{{ $item->alamat }}" disabled />
                    </div>
                  </div>
                  {{-- <div class="col-md-12">
                    <div class="form-group">
                      <label>Password User</label>
                      <input type="text" class="form-control" name="password" />
                      <small>Kosongkan jika tidak ingin mengganti password</small>
                    </div>
                  </div> --}}
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Roles</label>
                      @if ($item->id == 1)                            
                        <option value="{{ $item->roles }}" disabled>{{ $item->roles }}</option>
                      @else                            
                        <select name="roles" required class="form-control">
                          <option value="{{ $item->roles }}" selected>Tidak diganti</option>
                          <option value="ADMIN">Admin</option>
                          <option value="USER">User</option>
                        </select>
                        @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col text-right">
                    <button
                      type="submit"
                      class="btn btn-success px-5"
                    >
                      Simpan
                    </button>
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
