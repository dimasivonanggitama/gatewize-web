@extends('admin.app')

@section('content')
<div class="col-md-6 grid-margin stretch-card">
	<div class="card">
		<div class="card-body">
			@if (session('status'))
			<div class="alert alert-success">
				{{ session('status') }}
			</div>
			@endif
			<h4 class="card-title">{{$ticket->title}}</h4>
			<div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Category</label>
				<p>{{$ticket->category->name}}</p>
			</div>
			<div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Status</label>
				@if($ticket->status == 'open')
				<label class="badge badge-success">{{$ticket->status}}</label>
				@else
				<label class="badge badge-danger">{{$ticket->status}}</label>
				@endif
			</div>
			<div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Created at</label>
				<label>{{$ticket->created_at}}</label>
			</div>
			<hr>

			<form class="forms-sample" method="POST" action="/admin/comment">
				{{csrf_field()}}
				<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
				<div class="form-group">
					<label for="exampleTextarea1">Comment</label>
					<textarea class="form-control" id="exampleTextarea1" rows="6" name="comment"></textarea>
				</div>
				<button type="submit" class="btn btn-primary" style="float: right;">Submit</button>
			</form>
		</div>
	</div>
</div>
@endsection