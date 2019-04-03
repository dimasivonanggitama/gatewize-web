@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-cube text-danger icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Deposit</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">Rp. {{ number_format(Auth::user()->balance) }}</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Deposit tersedia saat ini
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <i class="mdi mdi-receipt text-warning icon-lg"></i>
                        </div>
                        <div class="float-right">
                            <p class="mb-0 text-right">Service</p>
                            <div class="fluid-container">
                                <h3 class="font-weight-medium text-right mb-0">4</h3>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted mt-3 mb-0">
                        <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Total service langganan
                    </p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
            <div class="card card-statistics">
            <div class="card-body">
                <div class="clearfix">
                <div class="float-left">
                    <i class="mdi mdi-account-location text-info icon-lg"></i>
                </div>
                <div class="float-right">
                    <p class="mb-0 text-right">Akun</p>
                    <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0">10</h3>
                    </div>
                </div>
                </div>
                <p class="text-muted mt-3 mb-0">
                <i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> Jumlah akun saat ini
                </p>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                      <h2 class="card-title mb-0">Product Analysis</h2>
                      <div class="wrapper d-flex">
                        <div class="d-flex align-items-center mr-3">
                          <span class="dot-indicator bg-success"></span>
                          <p class="mb-0 ml-2 text-muted">Product</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <span class="dot-indicator bg-primary"></span>
                          <p class="mb-0 ml-2 text-muted">Resources</p>
                        </div>
                      </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="dashboard-area-chart" height="80"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')
<script src="{!! asset('template/backend/node_modules/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('template/backend/node_modules/raphael/raphael.min.js') !!}"></script>

<script src="{!! asset('template/backend/assets/js/main/dashboard.js') !!}"></script>
@endsection

@section('custom_css')
<link rel="stylesheet" href="{!! asset('template/backend/node_modules/morris.js/morris.css') !!}"/>
@endsection
