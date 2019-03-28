<!-- ini buat extend admin.app, jadi kamu gaperlu bikin sidebar / nav / footer, sudah ada disitu semua -->
@extends('admin.app')

<!-- content ini dari admin.app ada yield('content') -->
@section('content')
	<!-- #Profile page# -->
	<!-- Title and account information section -->
	<div class="row d-flex justify-content-center">
		<div class="col-xs-1 center-block text-center">
			<div class="content-center">
				<h1 class="display-1">Profil Akun</h1>
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
	</div>
	
	<!-- Update avatar Section-->
	<div class="row">
		<div class="col">
			<hr>
			<h3>Foto Profil</h3>
		</div>
	</div>		
	<div class="row">
		<div class="mx-auto">
			<div class="card-deck text-center">
				<div class="card bg-light border border-secondary">
					<div class="card-body">
						<form action="">
							<div class="form-group">
								{{ csrf_field() }}
								<h6 class="card-title">Hapus foto profil</h6>
								<button class="btn btn-danger"  type="submit">Hapus</button>
								<!-- Modal: Konfirmasi hapus foto -->
									
								<!-- -->
							</div>
						</form>
					</div>
				</div>
				<div class="col-xs">
					<div class="card-body">
						<p>atau</p>
					</div>
				</div>
				<div class="card bg-light border border-secondary">
					<div class="card-body">
						<div class="form-group">
							<form action="" enctype="multipart/form-data" method="post">
								{{ csrf_field() }}
								<div class="form-group">
									<h6 class="card-title">Ganti foto profil</h6>
									<input aria-describedby="help_input_avatar" class="form-control-file" type="file" id="input_avatar" name="input_avatar" accept=".jpg,.png" required>
									<small id="help_input_avatar" class="form-text text-muted">Pilih dari komputer anda</small>
									<div class="invalid-feedback">Invalid image file. Please choose it correctly.</div>
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
			
			<p></p>
			
	<!-- Update Biodata Section -->
	<div class="row">
		<div class="col">
			<hr>
			<h3>Biodata</h3>
		</div>
	</div>		
	<div class="row">
		<div class="mx-auto">
			<div class="card bg-light" style="width: 50rem;">
				<div class="card-body">
					<form action="" aria-describedby="help_form_permintaan">
						<div class="form-group">
							<label for="input_nama_user">Username</label>
							<input type="text" class="form-control" id="input_nama_user" placeholder="{{ Auth::user()->username }}">
						</div>
						<div class="form-group">
							<label for="input_nama_lengkap">Nama Lengkap</label>
							<input type="text" class="form-control" id="input_nama_lengkap" placeholder="{{ Auth::user()->fullname }}">
						</div>
						<div class="form-group">
							<label for="input_alamat">Alamat</label>
							<input type="text" class="form-control" id="input_alamat" placeholder="{{ Auth::user()->address }}">
						</div>
						<div class="form-group">
							<label for="input_alamat_email">Alamat Email</label>
							<input type="text" class="form-control" id="input_alamat_email" placeholder="{{ Auth::user()->email }}">
						</div>
						<div class="form-group">
							<label for="input_telegram">ID Telegram</label>
							<input type="text" class="form-control" id="input_telegram" placeholder="{{ Auth::user()->email }}">
						</div>
						<div class="text-center">
							<button type="submit" class="btn btn-primary">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- # Change Password page #-->
	<!-- Change password Title section -->
	<div class="row d-flex justify-content-center">
		<div class="col-xs-1 center-block text-center">
			<div class="content-center">
				<h1 class="display-1">Ganti Password</h1>
			</div>
		</div>
	</div>
	
	<!-- Change password form Section-->
	<div class="row">
		<div class="mx-auto">
			<div class="card bg-light" style="width: 50rem;">
				<div class="card-body">
					<form action="" aria-describedby="help_form_permintaan">
						<div class="form-group">
							<label for="input_password">Password Lama</label>
							<input type="password" class="form-control" id="input_password" placeholder="Masukkan password lama anda">
						</div>
						<div class="form-group">
							<label for="input_password">Password Baru</label>
							<input type="password" class="form-control" id="input_password" placeholder="Masukkan password baru anda">
						</div>
						<div class="form-group">
							<label for="input_password_confirm">Confirm Password</label>
							<input type="password" class="form-control" id="input_password_confirm" placeholder="Masukkan kembali password baru anda">
						</div>
						<button type="submit" class="btn btn-primary">Update</button>
					</form>
				</div>
			</div>
		</div>
	</div>
						
						
		<!-- Edit Akun Section -->
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
										
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endsection