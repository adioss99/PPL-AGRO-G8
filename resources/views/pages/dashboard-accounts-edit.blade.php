@extends('layouts.dashboard')

@section('title')
  Edit Akun
@endsection

@section('content')
        <div
        class="section-content section-dashboard-home"
        data-aos="fade-up"
        >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Akun</h2>
                <p class="dashboard-subtitle">
                  Perbarui akun anda
                </p>
              </div>
              <div class="dashboard-content">
                <div class="row">
                  <div class="col-12">
                    <form action="{{route('dashboard-accounts-update')}}" method="POST" enctype="multipart/form-data">
                      @csrf
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
                                  name="full_name"
                                  value="{{auth()->user()->full_name}}"
                                required/>
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
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="addressOne">Alamat</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="alamat"
                                  aria-describedby="emailHelp"
                                  name="alamat"
                                  value="{{auth()->user()->alamat}}"
                                required/>
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="mobile">Nomor HP</label>
                                <input
                                  type="text"
                                  class="form-control"
                                  id="mobile"
                                  name="phone_number"
                                  value="{{auth()->user()->phone_number}}"
                                required/>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col text-right">
                              <button
                                type="submit"
                                class="btn btn-success px-5"
                              >
                                Simpan <i class="bi bi-check2-square"></i>
                              </button>
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
