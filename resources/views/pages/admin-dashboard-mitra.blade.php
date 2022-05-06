@extends('layouts.admin-dashboard')

@section('title')
    User 
@endsection

@push('addon-style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.11.5/datatables.min.css"/>
@endpush

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h2 class="dashboard-title">Daftar User</h2>
            <p class="dashboard-subtitle">
                <br />
            </p>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
</script>
@endpush