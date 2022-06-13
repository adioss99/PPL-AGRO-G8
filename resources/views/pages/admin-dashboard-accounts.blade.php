@extends('layouts.admin-dashboard')

@section('title')
    Akun Admin
@endsection

@section('content')
@include('sweetalert::alert')
        <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Akun</h2>
                <p class="dashboard-subtitle">
                 <br>
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="">
                      <div class="card">
                        <div class="card-body">
                          <div class="row mb-2">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="name"
                                  aria-describedby="emailHelp"
                                  name="name"
                                  value="{{auth()->user()->full_name}}"
                                disabled/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input
                                  type="email"
                                  class="form-control"
                                  id="email"
                                  aria-describedby="emailHelp"
                                  name="email"
                                  value="{{auth()->user()->email}}"
                                disabled/>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="addressOne">Alamat</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="addressOne"
                                  aria-describedby="emailHelp"
                                  name="addressOne"
                                  value="{{auth()->user()->alamat}}"
                                disabled/>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="mobile">Nomor HP</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="mobile"
                                  name="mobile"
                                  value="{{auth()->user()->phone_number}}"
                                disabled/>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <a
                                class="btn btn-success px-5"
                                href="{{route('admin-dashboard-accounts-edit')}}"
                              >
                                Edit <i class="bi bi-pencil-square"></i>
                              </a>
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
