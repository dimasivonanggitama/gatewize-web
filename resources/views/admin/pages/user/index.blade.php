@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Data User</h4>
		<div class="row">
			<button class="btn btn-success" data-toggle="modal" data-target="#createModal" type="button">Add New User</button>
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
										<h5 class="modal-title">Are you sure delete "{{$user->fullname}}" ?</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-footer">
										<form class="forms-sample" method="POST" action="/admin/users/{{$user->id}}">
											@csrf
											@method('DELETE')
											<button type="button" class="btn btn-outline-danger" data-dismiss="modal">Back</button>
											<button type="submit" class="btn btn-danger" id="btn-update">Yes</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<div class="modal fade" id="editModal-{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title">Form Pembaruan {{$user->fullname}}</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<form class="forms-sample" method="POST" action="/admin/users/{{$user->id}}">
										<div class="modal-body">
											@csrf
											@method('PUT')
											<div class="form-group">
												<label for="exampleInputName1">Fullname</label>
												<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="fullname" value="{{$user->fullname}}"> 
											</div>
											<div class="form-group">
												<label for="exampleInputName1">Username</label>
												<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="username" value="{{$user->username}}"> 
											</div>
											<div class="form-group">
												<label for="exampleInputEmail3">Email address</label>
												<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" value="{{$user->email}}"> 
											</div>                
											<div class="form-group">
												<label for="exampleTextarea1">Address</label> <textarea class="form-control" id="exampleTextarea1" rows="2" name="address">{{$user->address}}</textarea> 
											</div>
											<div class="form-group">
												<label for="exampleInputName1">TelegramID</label>
												<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="telegram" value="{{$user->telegram}}"> 
											</div>
											<div class="form-group">
												<label for="exampleInputName1">Balance</label>
												<input type="number" class="form-control" id="exampleInputName1" placeholder="Name" name="balance" value="{{$user->balance}}"> 
											</div>  
											<div class="form-group">
												<label>Role</label>
												<select class="js-example-basic-single" style="width:100%" name="role_id">
													<option value="{{$user->role->id}}"  default>{{$user->role->name}}</option>
													@foreach($roles as $role)
													<option value="{{$role->id}}">{{$role->name}}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div class="modal-footer">

											<button type="submit" class="btn btn-success mr-2" style="float: right;">Submit</button>
											<button type="button" class="btn btn-light" data-miss="modal">Cancel</button>
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
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">User Form</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form class="forms-sample" method="POST" action="/admin/users">
				<div class="modal-body">
					@csrf
					<div class="form-group">
						<label for="exampleInputName1">Fullname</label>
						<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="fullname"> 
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Username</label>
						<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="username"> 
					</div>
					<div class="form-group">
						<label for="exampleInputEmail3">Email address</label>
						<input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email"> 
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password"> 
					</div>
					<div class="form-group">
						<label for="exampleInputPassword4">Password Confirmation</label>
						<input type="password" class="form-control" id="exampleInputPassword4" placeholder="Password" name="password_confirmation"> 
					</div>                   
					<div class="form-group">
						<label for="exampleTextarea1">Address</label> <textarea class="form-control" id="exampleTextarea1" rows="2" name="address"></textarea> 
					</div>
					<div class="form-group">
						<label for="exampleInputName1">TelegramID</label>
						<input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="telegram"> 
					</div>
					<div class="form-group">
						<label for="exampleInputName1">Balance</label>
						<input type="number" class="form-control" id="exampleInputName1" placeholder="Name" name="balance"> 
					</div>  
					<div class="form-group">
						<label>Role</label>
						<select class="js-example-basic-single" style="width:100%" name="role_id">
							<option value="" disabled default></option>
							@foreach($roles as $role)
							<option value="{{$role->id}}">{{$role->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="modal-footer">

					<button type="submit" class="btn btn-success mr-2" style="float: right;">Submit</button>
					<button type="button" class="btn btn-light" data-miss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('custom_js')
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>
@endsection