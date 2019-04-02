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
                    <div class="chart-container"><div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                      <canvas id="dashboard-area-chart" height="572" width="2146" class="chartjs-render-monitor" style="display: block; height: 286px; width: 1073px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom_js')

<script src="{!! asset('theme/StarAdmin/js/demo_1/dashboard.js') !!}"></script>
@endsection
