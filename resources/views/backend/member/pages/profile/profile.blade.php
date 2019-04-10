<!-- ini buat extend admin.app, jadi kamu gaperlu bikin sidebar / nav / footer, sudah ada disitu semua -->
@extends('backend.app')

<!-- content ini dari admin.app ada yield('content') -->
@section('content')
	<div class="row profile-page">
		<div class="col-12">
		<div class="card">
			<div class="card-body">
			<div class="profile-header text-white">
				<div class="d-flex justify-content-around">
					<div class="profile-info d-flex align-items-center">
						<img class="rounded-circle img-lg" src="{{ Auth::user()->getAvatar(128) }}" alt="profile image">
						<div class="wrapper pl-4">
							<p class="profile-user-name" style="margin-bottom:10px;">{{ Auth::user()->fullname }}</p>
							<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#editModal">Edit Profile</button>
						</div>
					</div>
					<div class="details">
						<div class="detail-col">
						<p>Total Balance</p>
						<p>Rp. {{ Auth::user()->balance }}</p>
						</div>
					</div>
				</div>
			</div>
			<div class="profile-body">
				<ul class="nav tab-switch" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" id="user-profile-info-tab" data-toggle="pill" href="#user-profile-info" role="tab" aria-controls="user-profile-info" aria-selected="true">Profile</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" id="user-profile-activity-tab" data-toggle="pill" href="#user-profile-activity" role="tab" aria-controls="user-profile-activity" aria-selected="false">Activity</a>
					</li>
				</ul>
				<div class="row">
					<div class="col-md-9">
						<div class="tab-content tab-body" id="profile-log-switch">
							<div class="tab-pane fade show active pr-3" id="user-profile-info" role="tabpanel" aria-labelledby="user-profile-info-tab">
								<table class="table table-borderless w-100 mt-4">
									<tr>
										<td>
										<strong>Full Name :</strong> {{ Auth::user()->fullname }}</td>
										<td>
										<strong>Email :</strong> {{ Auth::user()->email }}</td>
									</tr>
									<tr>
										<td>
										<strong>Username :</strong> {{ Auth::user()->username }}</td>
										<td>
										<strong>Telegram :</strong> {{ Auth::user()->telegram }}</td>
									</tr>
									<tr>
										<td>
										<strong>License Key :</strong> {{ Auth::user()->license_key }}</td>
										<td>
										<strong>Address :</strong> {{ Auth::user()->address }}
										</td>
									</tr>
								</table>
							</div>
							<div class="tab-pane fade" id="user-profile-activity" role="tabpanel" aria-labelledby="user-profile-activity-tab">
								<div class="horizontal-timeline">
									<section class="time-frame">
										<h4 class="section-time-frame">Log Activity</h4>
										@foreach($activityLog as $item)
										<div class="event">
											<p class="event-text">Menu : {{ strtoupper($item->log_name) }}</p>
											<div class="event-alert">{{ $item->description }}</div>
											<div class="event-info">IP : {{ $item->properties['ip'] }}, {{ $item->created_at->diffForHumans() }}</div>
										</div>
										@endforeach
									</section>
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

	<!-- create modal -->
	<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Edit Profile</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="forms-sample" method="POST" action="{{ route('profile.update') }}">
				<div class="modal-body">
					@csrf
					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Nama Lengkap" value="{{ old('fullname', Auth::user()->fullname) }}" require>
						@if ($errors->first('fullname'))
							<small class="text-danger">{{ $errors->first('fullname') }}</small>
						@endif
					</div>
					<div class="form-group">
						<label for="username">Username</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="Username" value="{{ old('username', Auth::user()->username) }}" require>
						@if ($errors->first('username'))
							<small class="text-danger">{{ $errors->first('username') }}</small>
						@endif
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email" value="{{ old('email', Auth::user()->email) }}" require>
						@if ($errors->first('email'))
							<small class="text-danger">{{ $errors->first('email') }}</small>
						@endif
					</div>
					<div class="form-group">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="password" placeholder="Kosongi jika tidak ingin mengubah password" value="{{ old('password') }}">
						@if ($errors->first('password'))
							<small class="text-danger">{{ $errors->first('password') }}</small>
						@endif
					</div>
					<div class="form-group">
						<label for="address">Address</label>
						<textarea name="address" class="form-control" id="address" cols="30" rows="3">{{ old('address', Auth::user()->address) }}</textarea>
						@if ($errors->first('address'))
							<small class="text-danger">{{ $errors->first('address') }}</small>
						@endif
					</div>
					<div class="form-group">
						<label for="telegram">Telegram</label>
						<input type="text" class="form-control" id="telegram" name="telegram" placeholder="ID Telegram" value="{{ old('telegram', Auth::user()->telegram) }}" require>
						@if ($errors->first('telegram'))
							<small class="text-danger">{{ $errors->first('telegram') }}</small>
						@endif
					</div>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" class="btn btn-primary">Update</button>
				</div>
			</form>
		</div>
	</div>
	</div>
@endsection

@section('custom_css')
<style>
	.profile-page .profile-header{
		background: url("{{ asset('template/backend/assets/images/samples/profile_header_banner.jpg') }}") no-repeat center center;
	}
</style>
@endsection
