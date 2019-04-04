@extends('backend.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			<h4 class="card-title">Open Ticket</h4>
			<form class="forms-sample" action="{{route('ticket.create')}}" method="POST">
				{{csrf_field()}}
				<div class="form-group">
					<label for="exampleInputName1">Title</label>
					<input type="text" class="form-control" id="exampleInputName1" name="title">
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Category</label>
					<select class="form-control form-control-lg" id="exampleFormControlSelect1" name="category">
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
				<button type="submit" class="btn btn-primary" style="float: right;">Open Ticket</button>
			</form>
		</div>
	</div>
</div>
@endsection