<!-- ini buat extend admin.app, jadi kamu gaperlu bikin sidebar / nav / footer, sudah ada disitu semua -->
@extends('admin.app')

<!-- content ini dari admin.app ada yield('content') -->
@section('content')
	<div class="accordion" id="profileParent" role="tablist" aria-multiselectable="true">
		<div class="collapse show" id="collapseProfile" aria-expanded="true" data-parent="#profileParent">
			<div class="row d-flex justify-content-center">
				<div class="content-center ">
					<div class="profile-image">
						<img class="img-fluid img-thumbnail" src="{{ asset('theme/StarAdmin/images/faces/face1.jpg') }}" alt="profile image">
					</div>
					<div class="text-wrapper">
						<p class="profile-name">{{ Auth::user()->fullname }}</p>
						<div class="text-wrapper">
							Member since:
							<small class="designation text-muted">{{ Auth::user()->created_at }}</small>
						</div>
						<div class="text-wrapper">
							Last login:
							<small class="designation text-muted">@php echo date("d-m-Y");@endphp</small>
						</div>
						<div class="text-wrapper">
							License:
							<small class="designation text-muted">{{ Auth::user()->license_key }}</small>
						</div>
					</div>
				</div>
			</div>
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
		</div>
		
			<div class="collapse" id="collapseFoto" data-parent="#profileParent">
				<div class="row d-flex justify-content-center">
					<div class="col-xs-1 center-block text-center">
						<div class="content-center">
							<h1>Foto Profil</h1>
							<div class="profile-image">
								<img class="img-fluid img-thumbnail" src="images/faces/face1.jpg" alt="profile image">
							</div>
							<div class="text-wrapper">
								<p class="profile-name">{{ Auth::user()->fullname }}</p>
							</div>
							<form>
								<button type="submit" class="btn btn-primary">Hapus Foto</button>
								<!-- Modal: Konfirmasi hapus foto -->
									
								<!-- -->
							</form>
							
							<!-- Form update avatar -->
							<div class="mx-auto">
								<div class="card border border-secondary">
									<div class="card-body">
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
				</div>
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