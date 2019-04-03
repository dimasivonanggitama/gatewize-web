@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data User</h4>
		<div class="row">
			<a class="btn btn-success" href="/admin/users/create">Add New User</a>
			<div class="col-12">
				<table id="order-listing" class="table">
					<thead>
						<tr>
							<th>Fullname</th>
							<th>Username</th>
							<th>Email</th>
							<td>Address</td>
							<td>Balance</td>
							<td>License Key</td>
							<td>TelegramID</td>
							<th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($users as $user)
						<tr>
							<td style="max-width: 100px; white-space: normal;">{{$user->fullname}}</td>
							<td style="max-width: 50px; white-space: normal;">{{$user->username}}</td>
							<td style="max-width: 100px; white-space: normal;">{{$user->email}}</td>
							<td style="max-width: 100px; white-space: normal;">{{$user->address}}</td>
							<td style="max-width: 20px; white-space: normal;">{{$user->balance}}</td>
							<td style="max-width: 100px; white-space: normal;">{{$user->license_key}}</td>
							<td style="max-width: 20px; white-space: normal;">{{$user->telegram}}</td>
							<td style="max-width: 80px; white-space: normal;">{{$user->role->name}}</td>
							<td style="max-width: 100px;">
								<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{$user->id}}" style="padding: 0.5rem;">Edit</button>
								<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$user->id}}" style="padding: 0.5rem;">Delete</button>
							</td>
						</tr>
						<div class="modal fade" id="deleteModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Apa anda yakin akan menghapus "{{$user->nama}}" ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<form class="forms-sample" method="POST" action="/admin/user/{{$user->id}}">
											@csrf
											{{method_field('DELETE')}}
											<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
											<button type="submit" class="btn btn-danger" id="btn-update">Ya</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="editModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Form Pembaruan {{$user->nama}} ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form class="forms-sample" method="POST" action="/admin/user/{{$user->id}}" enctype="multipart/form-data">
										@csrf
										@method('PUT')
										<div class="modal-body">
											<div class="form-group">
												<img class="img-fluid mb-2" src="/storage/{{optional($user->image)->path}}" style="width: 50%; margin-left: 25%;">
												<label style="display: block;">Gambar Visual Kain</label>
												<input type="file" class="file-upload-default" name="gambar">
												<div class="input-group col-xs-12">
													<input type="text" class="form-control file-upload-info" disabled>
													<span class="input-group-append">
														<button class="file-upload-browse btn btn-info" type="button">Upload</button>
													</span>
												</div>
												@if ($errors->has('image'))
												<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('image') }}</label>
												@endif
											</div>
											<div class="form-group">
												<label for="namaInput">Nama Produk</label>
												<input type="text" class="form-control" id="namaINput" name="nama" value="{{$user->nama}}"> 
												@if ($errors->has('nama'))
												<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('nama') }}</label>
												@endif
											</div>
											<div class="form-group">
												<label for="deskripsiInput">Deskripsi Produk</label> 
												<textarea class="form-control" id="deskripsiInput" rows="4" name="deskripsi">{{$user->deskripsi}}</textarea> 
												@if ($errors->has('deskripsi'))
												<label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('deskripsi') }}</label>
												@endif
											</div>
										</div>
										<div class="modal-footer">
											<button class="btn btn-light" data-miss="modal">Kembali</button>
											<button type="submit" class="btn btn-success mr-2" style="float: right;">Simpan</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('custom_js')
@endsection