@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    @include('sweetalert::alert')
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Dashboard</h2>
            <p class="dashboard-subtitle">
                <br />
            </p>
        </div>
    </div>
</div>
@endsection