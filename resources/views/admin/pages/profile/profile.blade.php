<!-- ini buat extend admin.app, jadi kamu gaperlu bikin sidebar / nav / footer, sudah ada disitu semua -->
@extends('admin.app')

<!-- content ini dari admin.app ada yield('content') -->
@section('content')
	<div class="row d-flex justify-content-center">
		<div class="col-xs-1 center-block text-center">
			<div class="content-center">
				<h1>Profil Akun</h1>
				<div class="profile-image">
					<img class="img-fluid img-thumbnail" src="images/faces/face1.jpg" alt="profile image">
				</div>
				<div class="text-wrapper">
					<p class="profile-name">{{ Auth::user()->fullname }}</p>
					<div class="text-wrapper">
						Member since:
						<small class="designation text-muted">{{ Auth::user()->created_at }}</small>
					</div>
					<div class="text-wrapper">
						Last login:
						<small class="designation text-muted">(DD/MM/YYYY)</small>
					</div>
					<div class="text-wrapper">
						Last Update(s):
						<small class="designation text-muted">(DD/MM/YYYY)</small>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!-- Update avatar Section-->
	<div class="row">
		<div class="col">
			<hr>
			<h3>Foto Profil</h3>
		</div>
	</div>
	
		<div class="mx-auto">
		</div>
		
	<div class="row">
		<div class="card bg-light">
			<div class="card-body">
				<div class="col">
					<div class="form-group">
						<form action="">
							{{ csrf_field() }}
							<label for="delete_avatar">Hapus foto profil</label>
							<button class="btn btn-danger" id="delete_avatar" type="submit">Hapus Foto</button>
							<!-- Modal: Konfirmasi hapus foto -->
								
							<!-- -->
						</form>
					</div>
				</div>
				<div class="col">
					<div class="form-group">
						<form action="" enctype="multipart/form-data" method="post">
							{{ csrf_field() }}
							<div class="form-group">
								<label for="input_avatar">Pilih file gambar profile...</label>
								<div class="row">
									<div class="col-8.9">
										<input type="file" class="form-control-file" id="input_avatar" name="input_avatar" accept=".jpg,.png" required>
										<div class="invalid-feedback">Example invalid custom file feedback</div>
									</div>
									<div class="col">
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
			
			<p></p>
			
	<div class="accordion" id="profileParent" role="tablist" aria-multiselectable="true">
		<div class="collapse show" id="collapseProfile" aria-expanded="true" data-parent="#profileParent">
			
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
					<div class="card card-statistics">
						<div class="card-body">
							<div class="clearfix">
								<div class="float-left">
									<i class="mdi mdi-cube text-danger icon-lg"></i>
								</div>
								<div class="float-right">
									<p class="mb-0 text-right">Total Revenue</p>
									<div class="fluid-container">
									<h3 class="font-weight-medium text-right mb-0">$65,650</h3>
									</div>
								</div>
							</div>
							<p class="text-muted mt-3 mb-0">
							<i class="mdi mdi-alert-octagon mr-1" aria-hidden="true"></i> 65% lower growth
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
					<div class="card card-statistics">
						<div class="card-body">
							<div class="clearfix">
								<div class="float-left">
									<i class="mdi mdi-receipt text-warning icon-lg"></i>
								</div>
								<div class="float-right">
									<p class="mb-0 text-right">Orders</p>
									<div class="fluid-container">
									<h3 class="font-weight-medium text-right mb-0">3455</h3>
									</div>
								</div>
							</div>
							<p class="text-muted mt-3 mb-0">
							<i class="mdi mdi-bookmark-outline mr-1" aria-hidden="true"></i> Product-wise sales
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
					<div class="card card-statistics">
						<div class="card-body">
							<div class="clearfix">
							<div class="float-left">
								<i class="mdi mdi-poll-box text-success icon-lg"></i>
							</div>
							<div class="float-right">
								<p class="mb-0 text-right">Sales</p>
								<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0">5693</h3>
								</div>
							</div>
							</div>
							<p class="text-muted mt-3 mb-0">
							<i class="mdi mdi-calendar mr-1" aria-hidden="true"></i> Weekly Sales
							</p>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 grid-margin stretch-card">
					<div class="card card-statistics">
						<div class="card-body">
							<div class="clearfix">
							<div class="float-left">
								<i class="mdi mdi-account-location text-info icon-lg"></i>
							</div>
							<div class="float-right">
								<p class="mb-0 text-right">Employees</p>
								<div class="fluid-container">
								<h3 class="font-weight-medium text-right mb-0">246</h3>
								</div>
							</div>
							</div>
							<p class="text-muted mt-3 mb-0">
							<i class="mdi mdi-reload mr-1" aria-hidden="true"></i> Product-wise sales
							</p>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-lg-7 grid-margin stretch-card">
				<!--weather card-->
				<div class="card card-weather">
				<div class="card-body">
					<div class="weather-date-location">
					<h3>Monday</h3>
					<p class="text-gray">
						<span class="weather-date">25 October, 2016</span>
						<span class="weather-location">London, UK</span>
					</p>
					</div>
					<div class="weather-data d-flex">
					<div class="mr-auto">
						<h4 class="display-3">21
						<span class="symbol">&deg;</span>C</h4>
						<p>
						Mostly Cloudy
						</p>
					</div>
					</div>
				</div>
				<div class="card-body p-0">
					<div class="d-flex weakly-weather">
					<div class="weakly-weather-item">
						<p class="mb-0">
						Sun
						</p>
						<i class="mdi mdi-weather-cloudy"></i>
						<p class="mb-0">
						30°
						</p>
					</div>
					<div class="weakly-weather-item">
						<p class="mb-1">
						Mon
						</p>
						<i class="mdi mdi-weather-hail"></i>
						<p class="mb-0">
						31°
						</p>
					</div>
					<div class="weakly-weather-item">
						<p class="mb-1">
						Tue
						</p>
						<i class="mdi mdi-weather-partlycloudy"></i>
						<p class="mb-0">
						28°
						</p>
					</div>
					<div class="weakly-weather-item">
						<p class="mb-1">
						Wed
						</p>
						<i class="mdi mdi-weather-pouring"></i>
						<p class="mb-0">
						30°
						</p>
					</div>
					<div class="weakly-weather-item">
						<p class="mb-1">
						Thu
						</p>
						<i class="mdi mdi-weather-pouring"></i>
						<p class="mb-0">
						29°
						</p>
					</div>
					<div class="weakly-weather-item">
						<p class="mb-1">
						Fri
						</p>
						<i class="mdi mdi-weather-snowy-rainy"></i>
						<p class="mb-0">
						31°
						</p>
					</div>
					<div class="weakly-weather-item">
						<p class="mb-1">
						Sat
						</p>
						<i class="mdi mdi-weather-snowy"></i>
						<p class="mb-0">
						32°
						</p>
					</div>
					</div>
				</div>
				</div>
				<!--weather card ends-->
			</div>
			<div class="col-lg-5 grid-margin stretch-card">
				<div class="card">
				<div class="card-body">
					<h2 class="card-title text-primary mb-5">Performance History</h2>
					<div class="wrapper d-flex justify-content-between">
					<div class="side-left">
						<p class="mb-2">The best performance</p>
						<p class="display-3 mb-4 font-weight-light">+45.2%</p>
					</div>
					<div class="side-right">
						<small class="text-muted">2017</small>
					</div>
					</div>
					<div class="wrapper d-flex justify-content-between">
					<div class="side-left">
						<p class="mb-2">Worst performance</p>
						<p class="display-3 mb-5 font-weight-light">-35.3%</p>
					</div>
					<div class="side-right">
						<small class="text-muted">2015</small>
					</div>
					</div>
					<div class="wrapper">
					<div class="d-flex justify-content-between">
						<p class="mb-2">Sales</p>
						<p class="mb-2 text-primary">88%</p>
					</div>
					<div class="progress">
						<div class="progress-bar bg-primary progress-bar-striped progress-bar-animated" role="progressbar" style="width: 88%" aria-valuenow="88"
						aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					</div>
					<div class="wrapper mt-4">
					<div class="d-flex justify-content-between">
						<p class="mb-2">Visits</p>
						<p class="mb-2 text-success">56%</p>
					</div>
					<div class="progress">
						<div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: 56%" aria-valuenow="56"
						aria-valuemin="0" aria-valuemax="100"></div>
					</div>
					</div>
				</div>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-12 grid-margin">
				<div class="card">
				<div class="card-body">
					<div class="row d-none d-sm-flex mb-4">
					<div class="col-4">
						<h5 class="text-primary">Unique Visitors</h5>
						<p>34657</p>
					</div>
					<div class="col-4">
						<h5 class="text-primary">Bounce Rate</h5>
						<p>45673</p>
					</div>
					<div class="col-4">
						<h5 class="text-primary">Active session</h5>
						<p>45673</p>
					</div>
					</div>
					<div class="chart-container">
					<canvas id="dashboard-area-chart" height="80"></canvas>
					</div>
				</div>
				</div>
			</div>
			</div>
			<div class="row">
			<div class="col-lg-12 grid-margin">
				<div class="card">
				<div class="card-body">
					<h4 class="card-title">Orders</h4>
					<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
						<tr>
							<th>
							#
							</th>
							<th>
							First name
							</th>
							<th>
							Progress
							</th>
							<th>
							Amount
							</th>
							<th>
							Sales
							</th>
							<th>
							Deadline
							</th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td class="font-weight-medium">
							1
							</td>
							<td>
							Herman Beck
							</td>
							<td>
							<div class="progress">
								<div class="progress-bar bg-success progress-bar-striped" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0"
								aria-valuemax="100"></div>
							</div>
							</td>
							<td>
							$ 77.99
							</td>
							<td class="text-danger"> 53.64%
							<i class="mdi mdi-arrow-down"></i>
							</td>
							<td>
							May 15, 2015
							</td>
						</tr>
						<tr>
							<td class="font-weight-medium">
							2
							</td>
							<td>
							Messsy Adam
							</td>
							<td>
							<div class="progress">
								<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0"
								aria-valuemax="100"></div>
							</div>
							</td>
							<td>
							$245.30
							</td>
							<td class="text-success"> 24.56%
							<i class="mdi mdi-arrow-up"></i>
							</td>
							<td>
							July 1, 2015
							</td>
						</tr>
						<tr>
							<td class="font-weight-medium">
							3
							</td>
							<td>
							John Richards
							</td>
							<td>
							<div class="progress">
								<div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0"
								aria-valuemax="100"></div>
							</div>
							</td>
							<td>
							$138.00
							</td>
							<td class="text-danger"> 28.76%
							<i class="mdi mdi-arrow-down"></i>
							</td>
							<td>
							Apr 12, 2015
							</td>
						</tr>
						<tr>
							<td class="font-weight-medium">
							4
							</td>
							<td>
							Peter Meggik
							</td>
							<td>
							<div class="progress">
								<div class="progress-bar bg-primary progress-bar-striped" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0"
								aria-valuemax="100"></div>
							</div>
							</td>
							<td>
							$ 77.99
							</td>
							<td class="text-danger"> 53.45%
							<i class="mdi mdi-arrow-down"></i>
							</td>
							<td>
							May 15, 2015
							</td>
						</tr>
						<tr>
							<td class="font-weight-medium">
							5
							</td>
							<td>
							Edward
							</td>
							<td>
							<div class="progress">
								<div class="progress-bar bg-danger progress-bar-striped" role="progressbar" style="width: 35%" aria-valuenow="35" aria-valuemin="0"
								aria-valuemax="100"></div>
							</div>
							</td>
							<td>
							$ 160.25
							</td>
							<td class="text-success"> 18.32%
							<i class="mdi mdi-arrow-up"></i>
							</td>
							<td>
							May 03, 2015
							</td>
						</tr>
						<tr>
							<td class="font-weight-medium">
							6
							</td>
							<td>
							Henry Tom
							</td>
							<td>
							<div class="progress">
								<div class="progress-bar bg-warning progress-bar-striped" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0"
								aria-valuemax="100"></div>
							</div>
							</td>
							<td>
							$ 150.00
							</td>
							<td class="text-danger"> 24.67%
							<i class="mdi mdi-arrow-down"></i>
							</td>
							<td>
							June 16, 2015
							</td>
						</tr>
						</tbody>
					</table>
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
						<img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face1.jpg" alt="profile image">
						</div>
						<div class="ticket-details col-md-9">
						<div class="d-flex">
							<p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">James :</p>
							<p class="text-primary mr-1 mb-0">[#23047]</p>
							<p class="mb-0 ellipsis">Donec rutrum congue leo eget malesuada.</p>
						</div>
						<p class="text-gray ellipsis mb-2">Donec rutrum congue leo eget malesuada. Quisque velit nisi, pretium ut lacinia in, elementum id enim
							vivamus.
						</p>
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
							<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Manage
							</button>
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
						<img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face2.jpg" alt="profile image">
						</div>
						<div class="ticket-details col-md-9">
						<div class="d-flex">
							<p class="text-dark font-weight-semibold mr-2 mb-0 no-wrap">Stella :</p>
							<p class="text-primary mr-1 mb-0">[#23135]</p>
							<p class="mb-0 ellipsis">Curabitur aliquet quam id dui posuere blandit.</p>
						</div>
						<p class="text-gray ellipsis mb-2">Pellentesque in ipsum id orci porta dapibus. Sed porttitor lectus nibh. Curabitur non nulla sit amet
							nisl.
						</p>
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
							<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Manage
							</button>
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
						<img class="img-sm rounded-circle mb-4 mb-md-0" src="images/faces/face3.jpg" alt="profile image">
						</div>
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
							<button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Manage
							</button>
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
		</div>
		
			<div class="collapse" id="collapseFoto" data-parent="#profileParent">
				
			</div>
		<div>
		
		<!-- Biodata Section -->
		<div class="collapse" id="collapseBiodata" data-parent="#profileParent">
			<div class="row d-flex justify-content-center">
				<div class="content-center">
					<div class="mx-auto">
						<div class="">
							Edit Biodata
						</div>
						
						<div class="card bg-light" style="width: 50rem;">
							<div class="card-body">
								<form action="" aria-describedby="help_form_permintaan">
									<div class="form-group">
										<label for="input_nama_lengap">Nama Lengkap</label>
										<input type="text" class="form-control" id="input_nama_lengkap" placeholder="{{ Auth::user()->fullname }}">
									</div>
									<div class="form-group">
										<label for="input_alamat">Alamat</label>
										<input type="text" class="form-control" id="input_alamat" placeholder="{{ Auth::user()->address }}">
									</div>
									<button type="submit" class="btn btn-primary">Update</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Biodata Section -->
		<div>
			<div class="collapse" id="collapseAkun" data-parent="#profileParent">
				<div class="row d-flex justify-content-center">
					<div class="content-center">
						<div class="mx-auto">
							<div class="">
								Edit Akun
							</div>
							
							<div class="card bg-light" style="width: 50rem;">
								<div class="card-body">
									<form action="">
										<div class="form-group">
											<label for="input_alamat_email">Alamat Email</label>
											<input type="text" class="form-control" id="input_alamat_email" placeholder="{{ Auth::user()->email }}">
										</div>
										<div class="form-group">
											<label for="input_nama_user">Username</label>
											<input type="text" class="form-control" id="input_nama_user" placeholder="{{ Auth::user()->username }}">
										</div>
										<div class="form-group">
											<label for="input_password">Password</label>
											<input type="text" class="form-control" id="input_password" placeholder="Masukkan password baru anda">
										</div>
										<div class="form-group">
											<label for="input_password_confirm">Confirm Password</label>
											<input type="text" class="form-control" id="input_password_confirm" placeholder="Masukkan ulang password baru anda">
										</div>
										<button type="Update" class="btn btn-primary">Update</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection