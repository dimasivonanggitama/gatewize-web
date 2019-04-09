@extends('backend.app')

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
                            <h3 class="font-weight-medium text-right mb-0">{{ $totalAccount }}</h3>
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
                            <span class="dot-indicator" style="background-color:#e74c3c"></span>
                            <p class="mb-0 ml-2 text-muted">DIGIPOS</p>
                        </div>
                        <div class="d-flex align-items-center mr-3">
                            <span class="dot-indicator" style="background-color:#2ecc71"></span>
                            <p class="mb-0 ml-2 text-muted">GOJEK</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="dot-indicator" style="background-color:#9b59b6"></span>
                            <p class="mb-0 ml-2 text-muted">OVO</p>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="transaksi-tahunan-chart" height="100"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @if ($services['digipos']['yearly'][($month - 1)]['total'] > 100)
    <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 d-flex align-items-center">
                        <canvas id="digiposMonthlyChart" class="400x160 mb-6 mb-md-0" height="200"></canvas>
                    </div>
                    <div class="col-md-7">
                        <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Statistik DIGIPOS Bulan {{date('F')}}</h4>
                        @foreach($services['digipos']['monthly'] as $key => $statMonth)
                            @if($statMonth['status'] == 'success' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect' || $statMonth['status'] == 'process')
                            <div class="wrapper mt-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 font-weight-medium">{{ $statMonth['total']}}</p>
                                        <small class="text-muted ml-2">{{ucfirst($statMonth['status'] == 'process' ? 'Unknown' : $statMonth['status'])}} Requests</small>
                                    </div>
                                    <p class="mb-0 font-weight-medium">{{ round(($statMonth['total'] / $services['digipos']['yearly'][($month - 1)]['total']) * 100, 2)}}%</p>
                                </div>
                                <div class="progress">
                                    @php 
                                    $status = 'info'; 
                                    if($statMonth['status'] == 'success')
                                        $status = 'success';
                                    else if($statMonth['status'] == 'failed')
                                        $status = 'danger';
                                    else if($statMonth['status'] == 'suspect')
                                        $status = 'warning';
                                    else
                                        $status = 'info';
                                    @endphp
                                    <div class="progress-bar bg-{{$status}}" role="progressbar" style="width: {{ ceil(($statMonth['total'] / $services['digipos']['yearly'][($month - 1)]['total']) * 100)}}%" aria-valuenow="{{ ceil(($statMonth['total'] / $services['digipos']['yearly'][($month - 1)]['total']) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($services['gojek']['yearly'][($month - 1)]['total'] > 100)
    <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 d-flex align-items-center">
                        <canvas id="gojekMonthlyChart" class="400x160 mb-6 mb-md-0" height="200"></canvas>
                    </div>
                    <div class="col-md-7">
                        <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Statistik GOJEK Bulan {{date('F')}}</h4>
                        @foreach($services['gojek']['monthly'] as $key => $statMonth)
                            @if($statMonth['status'] == 'success' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect' || $statMonth['status'] == 'process')
                            <div class="wrapper mt-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 font-weight-medium">{{ $statMonth['total']}}</p>
                                        <small class="text-muted ml-2">{{ucfirst($statMonth['status'] == 'process' ? 'Unknown' : $statMonth['status'])}} Requests</small>
                                    </div>
                                    <p class="mb-0 font-weight-medium">{{ round(($statMonth['total'] / $services['gojek']['yearly'][($month - 1)]['total']) * 100, 2)}}%</p>
                                </div>
                                <div class="progress">
                                    @php 
                                    $status = 'info'; 
                                    if($statMonth['status'] == 'success')
                                        $status = 'success';
                                    else if($statMonth['status'] == 'failed')
                                        $status = 'danger';
                                    else if($statMonth['status'] == 'suspect')
                                        $status = 'warning';
                                    else
                                        $status = 'info';
                                    @endphp
                                    <div class="progress-bar bg-{{$status}}" role="progressbar" style="width: {{ ceil(($statMonth['total'] / $services['gojek']['yearly'][($month - 1)]['total']) * 100)}}%" aria-valuenow="{{ ceil(($statMonth['total'] / $services['gojek']['yearly'][($month - 1)]['total']) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    @if ($services['ovo']['yearly'][($month - 1)]['total'] > 100)
    <div class="col-sm-6 col-md-6 col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-5 d-flex align-items-center">
                        <canvas id="ovoMonthlyChart" class="400x160 mb-6 mb-md-0" height="200"></canvas>
                    </div>
                    <div class="col-md-7">
                        <h4 class="card-title font-weight-medium mb-0 d-none d-md-block">Statistik OVO Bulan {{date('F')}}</h4>
                        @foreach($services['ovo']['monthly'] as $key => $statMonth)
                            @if($statMonth['status'] == 'success' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect' || $statMonth['status'] == 'process')
                            <div class="wrapper mt-2">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 font-weight-medium">{{ $statMonth['total']}}</p>
                                        <small class="text-muted ml-2">{{ucfirst($statMonth['status'] == 'process' ? 'Unknown' : $statMonth['status'])}} Requests</small>
                                    </div>
                                    <p class="mb-0 font-weight-medium">{{ round(($statMonth['total'] / $services['ovo']['yearly'][($month - 1)]['total']) * 100, 2)}}%</p>
                                </div>
                                <div class="progress">
                                    @php 
                                    $status = 'info'; 
                                    if($statMonth['status'] == 'success')
                                        $status = 'success';
                                    else if($statMonth['status'] == 'failed')
                                        $status = 'danger';
                                    else if($statMonth['status'] == 'suspect')
                                        $status = 'warning';
                                    else
                                        $status = 'info';
                                    @endphp
                                    <div class="progress-bar bg-{{$status}}" role="progressbar" style="width: {{ ceil(($statMonth['total'] / $services['ovo']['yearly'][($month - 1)]['total']) * 100)}}%" aria-valuenow="{{ ceil(($statMonth['total'] / $services['ovo']['yearly'][($month - 1)]['total']) * 100)}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection

@section('custom_js')
<script src="{!! asset('template/backend/node_modules/morris.js/morris.min.js') !!}"></script>
<script src="{!! asset('template/backend/node_modules/raphael/raphael.min.js') !!}"></script>
<script>
(function ($) {
  'use strict';
  $(function () {

    if ($('#transaksi-tahunan-chart').length) {
      var lineChartCanvas = $("#transaksi-tahunan-chart").get(0).getContext("2d");
      var data = {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sep", "Okt", "Nov", "Desember"],
        datasets: [{
            label: 'DIGIPOS',
            data: [
                @php
                    for($i = 0;$i < 12;$i++){
                        echo $services['digipos']['yearly'][$i]['total'] . ",";
                    }
                @endphp
            ],
            backgroundColor: '#e74c3c',
            borderColor: '#c0392b',
            borderWidth: 1,
            fill: true
          },
          {
            label: 'GOJEK',
            data: [
                @php
                    for($i = 0;$i < 12;$i++){
                        echo $services['gojek']['yearly'][$i]['total'] . ",";
                    }
                @endphp
            ],
            backgroundColor: '#2ecc71',
            borderColor: '#27ae60',
            borderWidth: 1,
            fill: true
          },
          {
            label: 'OVO',
            data: [
                @php
                    for($i = 0;$i < 12;$i++){
                        echo $services['ovo']['yearly'][$i]['total'] . ",";
                    }
                @endphp
            ],
            backgroundColor: '#9b59b6',
            borderColor: '#8e44ad',
            borderWidth: 1,
            fill: true
          }
        ]
      };
      var options = {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
          yAxes: [{
            gridLines: {
              color: "#F2F6F9"
            },
            ticks: {
              beginAtZero: true,
              min: 0,
              max: 25000,
              stepSize: 2500,
            }
          }],
          xAxes: [{
            gridLines: {
              color: "#F2F6F9"
            },
            ticks: {
              beginAtZero: true
            }
          }]
        },
        legend: {
          display: false
        },
        elements: {
          point: {
            radius: 4
          }
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        },
        stepsize: 1
      };
      var lineChart = new Chart(lineChartCanvas, {
        type: 'line',
        data: data,
        options: options
      });
    }
  });
})(jQuery);
</script>
@if ($services['gojek']['yearly'][($month - 1)]['total'] > 100)
<script>
(function ($) {
  'use strict';
  $(function () {
    if ($("#gojekMonthlyChart").length) {
      var doughnutChartCanvas = $("#gojekMonthlyChart").get(0).getContext("2d");
      var doughnutPieData = {
        datasets: [{
          data: [
                    @php
                        foreach($services['gojek']['monthly'] as $key => $statMonth) {
                            if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect')
                                echo ceil(($statMonth['total'] / $services['gojek']['yearly'][($month - 1)]['total']) * 100) . ",";
                        }
                    @endphp
                ],
          backgroundColor: [
            @php
                foreach($services['gojek']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect'){
                        if($statMonth['status'] == 'success') {
                            echo 'successColor,';
                        } else if($statMonth['status'] == 'failed') {
                            echo 'dangerColor,';
                        } else if($statMonth['status'] == 'suspect') {
                            echo 'warningColor,';
                        } else {
                            echo 'infoColor,';
                        }
                    }
                }
            @endphp
          ],
          borderColor: [
            @php
                foreach($services['gojek']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success') {
                        echo 'successColor,';
                    } else if($statMonth['status'] == 'failed') {
                        echo 'dangerColor,';
                    } else if($statMonth['status'] == 'suspect') {
                        echo 'warningColor,';
                    } else {
                        echo 'infoColor,';
                    }
                }
            @endphp
          ],
        }],
        labels: [
          @php
                foreach($services['gojek']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect'){
                        echo "'" . ucfirst($statMonth['status'] == 'process' ? 'Unknown' : $statMonth['status']) . "',";
                    }
                }
            @endphp
        ]
      };
      var doughnutPieOptions = {
        cutoutPercentage: 70,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        legend: {
          display: false
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        }
      };
      var doughnutChart = new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: doughnutPieData,
        options: doughnutPieOptions
      });
    }
  });
})(jQuery);
</script>
@endif
@if ($services['digipos']['yearly'][($month - 1)]['total'] > 100)
<script>
(function ($) {
  'use strict';
  $(function () {
    if ($("#digiposMonthlyChart").length) {
      var doughnutChartCanvas = $("#digiposMonthlyChart").get(0).getContext("2d");
      var doughnutPieData = {
        datasets: [{
          data: [
                    @php
                        foreach($services['digipos']['monthly'] as $key => $statMonth) {
                            if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect')
                                echo ceil(($statMonth['total'] / $services['digipos']['yearly'][($month - 1)]['total']) * 100) . ",";
                        }
                    @endphp
                ],
          backgroundColor: [
            @php
                foreach($services['digipos']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect'){
                        if($statMonth['status'] == 'success') {
                            echo 'successColor,';
                        } else if($statMonth['status'] == 'failed') {
                            echo 'dangerColor,';
                        } else if($statMonth['status'] == 'suspect') {
                            echo 'warningColor,';
                        } else {
                            echo 'infoColor,';
                        }
                    }
                }
            @endphp
          ],
          borderColor: [
            @php
                foreach($services['digipos']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success') {
                        echo 'successColor,';
                    } else if($statMonth['status'] == 'failed') {
                        echo 'dangerColor,';
                    } else if($statMonth['status'] == 'suspect') {
                        echo 'warningColor,';
                    } else {
                        echo 'infoColor,';
                    }
                }
            @endphp
          ],
        }],
        labels: [
          @php
                foreach($services['digipos']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect'){
                        echo "'" . ucfirst($statMonth['status'] == 'process' ? 'Unknown' : $statMonth['status']) . "',";
                    }
                }
            @endphp
        ]
      };
      var doughnutPieOptions = {
        cutoutPercentage: 70,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        legend: {
          display: false
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        }
      };
      var doughnutChart = new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: doughnutPieData,
        options: doughnutPieOptions
      });
    }
  });
})(jQuery);
</script>
@endif
@if ($services['ovo']['yearly'][($month - 1)]['total'] > 100)
<script>
(function ($) {
  'use strict';
  $(function () {
    if ($("#ovoMonthlyChart").length) {
      var doughnutChartCanvas = $("#ovoMonthlyChart").get(0).getContext("2d");
      var doughnutPieData = {
        datasets: [{
          data: [
                    @php
                        foreach($services['ovo']['monthly'] as $key => $statMonth) {
                            if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect')
                                echo ceil(($statMonth['total'] / $services['ovo']['yearly'][($month - 1)]['total']) * 100) . ",";
                        }
                    @endphp
                ],
          backgroundColor: [
            @php
                foreach($services['ovo']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect'){
                        if($statMonth['status'] == 'success') {
                            echo 'successColor,';
                        } else if($statMonth['status'] == 'failed') {
                            echo 'dangerColor,';
                        } else if($statMonth['status'] == 'suspect') {
                            echo 'warningColor,';
                        } else {
                            echo 'infoColor,';
                        }
                    }
                }
            @endphp
          ],
          borderColor: [
            @php
                foreach($services['ovo']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success') {
                        echo 'successColor,';
                    } else if($statMonth['status'] == 'failed') {
                        echo 'dangerColor,';
                    } else if($statMonth['status'] == 'suspect') {
                        echo 'warningColor,';
                    } else {
                        echo 'infoColor,';
                    }
                }
            @endphp
          ],
        }],
        labels: [
          @php
                foreach($services['ovo']['monthly'] as $key => $statMonth) {
                    if($statMonth['status'] == 'success' || $statMonth['status'] == 'process' || $statMonth['status'] == 'failed' || $statMonth['status'] == 'suspect'){
                        echo "'" . ucfirst($statMonth['status'] == 'process' ? 'Unknown' : $statMonth['status']) . "',";
                    }
                }
            @endphp
        ]
      };
      var doughnutPieOptions = {
        cutoutPercentage: 70,
        animationEasing: "easeOutBounce",
        animateRotate: true,
        animateScale: false,
        responsive: true,
        maintainAspectRatio: true,
        showScale: true,
        legend: {
          display: false
        },
        layout: {
          padding: {
            left: 0,
            right: 0,
            top: 0,
            bottom: 0
          }
        }
      };
      var doughnutChart = new Chart(doughnutChartCanvas, {
        type: 'doughnut',
        data: doughnutPieData,
        options: doughnutPieOptions
      });
    }
  });
})(jQuery);
</script>
@endif
@endsection

@section('custom_css')
<link rel="stylesheet" href="{!! asset('template/backend/node_modules/morris.js/morris.css') !!}"/>
@endsection
