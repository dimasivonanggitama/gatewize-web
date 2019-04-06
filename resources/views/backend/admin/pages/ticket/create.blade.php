@extends('backend.app')

@section('content')
<div class="col-md-12 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">New Ticket</h4>
			<form class="forms-sample" action="/admin/tickets" method="POST">
				@csrf
				<div class="form-group">
					<label for="exampleInputName1">Title</label>
					<input type="text" class="form-control" id="exampleInputName1" name="title">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">User</label>
					<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="user_id">
						@foreach($users as $user)
						<option value="{{$user->id}}">{{$user->fullname}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Category</label>
					<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="category_id">
						@foreach($categories as $category)
						<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Priority</label>
					<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="priority">
						<option value="low">Low</option>
						<option value="medium">Medium</option>
						<option value="high">High</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleTextarea1">Message</label>
					<textarea class="form-control" id="exampleTextarea1" rows="6" name="message"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="float: right;">Create Ticket</button>
				<a class="btn btn-light" href="/admin/news">Cancel</a>
			</form>
		</div>
	</div>
</div>
@endsection


@section('custom_js')

<script src="{{ asset('template/backend/assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>
@endsection
