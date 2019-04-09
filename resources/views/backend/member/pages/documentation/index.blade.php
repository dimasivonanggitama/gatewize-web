@extends('admin.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Dokumen Installasi</h4>
                    <div class="row ml-md-0 mr-md-0 tab-minimal">
                      <ul class="nav nav-tabs col-md-2 vertical-tab justify-content-between" role="tablist">
                        <li class="nav-item">
                          <a class="nav-link active" id="tab-2-1" data-toggle="tab" href="#dashboard-2-1" role="tab" aria-controls="dashboard-2-1" aria-selected="true">
                            <i class="mdi mdi-speedometer"></i>Digipos</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-2-2" data-toggle="tab" href="#message-2-2" role="tab" aria-controls="message-2-2" aria-selected="false">
                            <i class="mdi mdi-message-outline"></i>TCASH</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-2-2" data-toggle="tab" href="#message-2-2" role="tab" aria-controls="message-2-2" aria-selected="false">
                            <i class="mdi mdi-message-outline"></i>MY-TSEL</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-2-3" data-toggle="tab" href="#campaigns-2-3" role="tab" aria-controls="campaigns-2-3" aria-selected="false">
                            <i class="mdi mdi-bell-outline"></i>GO-PAY</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-2-4" data-toggle="tab" href="#influencers-2-4" role="tab" aria-controls="influencers-2-4" aria-selected="false">
                            <i class="mdi mdi-account-outline"></i>OVO</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-2-5" data-toggle="tab" href="#payments-2-5" role="tab" aria-controls="payments-2-5" aria-selected="false">
                            <i class="mdi mdi-lightbulb-outline"></i>Tokopedia</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="tab-2-6" data-toggle="tab" href="#analytics-2-6" role="tab" aria-controls="analytics-2-6" aria-selected="false">
                            <i class="mdi mdi-airplay"></i>Bukalapak</a>
                        </li>
                      </ul>
                      <div class="tab-content col-md-10">
                        <div class="tab-pane fade show active" id="dashboard-2-1" role="tabpanel" aria-labelledby="tab-2-1">
                          <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs tab-basic" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#whoweare" role="tab" aria-controls="whoweare" aria-selected="true">IRS</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#ourgoal" role="tab" aria-controls="ourgoal" aria-selected="false">OTOMAX</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">TIGER</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#history" role="tab" aria-controls="history" aria-selected="false">3 PUTRI</a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-content-basic">
                                    <div class="tab-pane fade show active" id="whoweare" role="tabpanel" aria-labelledby="home-tab"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.<br>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat.
                                <br>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat. </div>
                                    <div class="tab-pane fade" id="ourgoal" role="tabpanel" aria-labelledby="profile-tab"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti eveniet, sapiente corrupti, vitae excepturi nulla soluta esse in ex, dignissimos velit rerum maiores asperiores! </div>
                                    <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="contact-tab"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia quibusdam assumenda fugit velit quis hic nulla necessitatibus? Nulla, possimus rerum quia sapiente necessitatibus! </div>
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