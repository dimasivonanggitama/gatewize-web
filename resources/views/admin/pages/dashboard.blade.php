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
                      <h2 class="card-title mb-0">Total Transaksi Bulanan</h2>
                      <div class="wrapper d-flex">
                        <div class="d-flex align-items-center mr-3">
                          <span class="dot-indicator bg-success"></span>
                          <p class="mb-0 ml-2 text-muted">Sukses</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <span class="dot-indicator bg-danger"></span>
                          <p class="mb-0 ml-2 text-muted">Gagal</p>
                        </div>
                         <div class="d-flex align-items-center">
                          <span class="dot-indicator bg-warning"></span>
                          <p class="mb-0 ml-2 text-muted">Suspect</p>
                        </div>
                         <div class="d-flex align-items-center">
                          <span class="dot-indicator bg-info"></span>
                          <p class="mb-0 ml-2 text-muted">Unknown</p>
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
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4">Manage Tickets</h5>
                    <div class="fluid-container">
                      <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                        <div class="col-md-1">
                          <img class="img-sm rounded-circle mb-4 mb-md-0 d-block mx-md-auto" src="../assets/images/faces/face1.jpg" alt="profile image"> </div>
                        <div class="ticket-details col-md-9">
                          <div class="d-flex">
                            <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
                            <p class="text-primary mr-1 mb-0">[#23047]</p>
                            <p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
                          </div>
                          <p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim vivamus. </p>
                          <div class="row text-gray d-md-flex d-none">
                            <div class="col-4 d-flex">
                              <small class="mb-0 mr-2 text-muted text-muted">Last responded :</small>
                              <small class="Last-responded mr-2 mb-0 text-muted text-muted">3 hours ago</small>
                            </div>
                            <div class="col-4 d-flex">
                              <small class="mb-0 mr-2 text-muted text-muted">Due in :</small>
                              <small class="Last-responded mr-2 mb-0 text-muted text-muted">2 Days</small>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-actions col-md-2">
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-history fa-fw"></i>Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row ticket-card mt-3 pb-2 border-bottom pb-3 mb-3">
                        <div class="col-md-1">
                          <img class="img-sm rounded-circle mb-4 mb-md-0 d-block mx-md-auto" src="../assets/images/faces/face2.jpg" alt="profile image"> </div>
                        <div class="ticket-details col-md-9">
                          <div class="d-flex">
                            <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Stella :</p>
                            <p class="text-primary mr-1 mb-0">[#23135]</p>
                            <p class="mb-0 ellipsis">Curabitur aliquet quam id dui posuere blandit.</p>
                          </div>
                          <p class="text-gray ellipsis mb-2">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl. </p>
                          <div class="row text-gray d-md-flex d-none">
                            <div class="col-4 d-flex">
                              <small class="mb-0 mr-2 text-muted">Last responded :</small>
                              <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                            </div>
                            <div class="col-4 d-flex">
                              <small class="mb-0 mr-2 text-muted">Due in :</small>
                              <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-actions col-md-2">
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-history fa-fw"></i>Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row ticket-card mt-3">
                        <div class="col-md-1">
                          <img class="img-sm rounded-circle mb-4 mb-md-0 d-block mx-md-auto" src="../assets/images/faces/face3.jpg" alt="profile image"> </div>
                        <div class="ticket-details col-md-9">
                          <div class="d-flex">
                            <p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">John Doe :</p>
                            <p class="text-primary mr-1 mb-0">[#23246]</p>
                            <p class="mb-0 ellipsis">Mauris blandit aliquet elit, eget tincidunt nibh pulvinar.</p>
                          </div>
                          <p class="text-gray ellipsis mb-2">Nulla quis lorem ut libero malesuada feugiat. Proin eget tortor risus. Lorem ipsum dolor sit amet.</p>
                          <div class="row text-gray d-md-flex d-none">
                            <div class="col-4 d-flex">
                              <small class="mb-0 mr-2 text-muted">Last responded :</small>
                              <small class="Last-responded mr-2 mb-0 text-muted">3 hours ago</small>
                            </div>
                            <div class="col-4 d-flex">
                              <small class="mb-0 mr-2 text-muted">Due in :</small>
                              <small class="Last-responded mr-2 mb-0 text-muted">2 Days</small>
                            </div>
                          </div>
                        </div>
                        <div class="ticket-actions col-md-2">
                          <div class="btn-group dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Manage </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-reply fa-fw"></i>Quick reply</a>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-history fa-fw"></i>Another action</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-check text-success fa-fw"></i>Resolve Issue</a>
                              <a class="dropdown-item" href="#">
                                <i class="fa fa-times text-danger fa-fw"></i>Close Issue</a>
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

@section('custom_js')

<script src="{!! asset('theme/StarAdmin/js/demo_1/dashboard.js') !!}"></script>
@endsection
