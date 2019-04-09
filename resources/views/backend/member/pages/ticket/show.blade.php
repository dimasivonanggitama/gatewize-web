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
			<h4 class="card-title">{{$ticket->title}}</h4>
			<div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Category</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="exampleInputPassword2" value="{{$ticket->category->name}}" disabled>
				</div>
			</div>
			<div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Status</label>

				@if($ticket->status == 'open')
				<label class="badge badge-success">{{$ticket->status}}</label>
				@elseif($ticket->status == 'closed')
				<label class="badge badge-danger">{{$ticket->status}}</label>
				@else 
				<label class="badge badge-primary">{{$ticket->status}}</label>
				@endif
			</div>
			<div class="form-group row">
				<label for="exampleInputPassword2" class="col-sm-3 col-form-label">Created at</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" id="exampleInputPassword2" value="{{$ticket->created_at}}" disabled>
				</div>
			</div>
			<hr>
			<label>Comments</label>
			@foreach ($comments as $comment)
			<div class="form-group">
					<label for="exampleTextarea1">{{ $comment->user->fullname }} - {{ $comment->created_at->diffForHumans() }}</label>
					<textarea class="form-control" id="exampleTextarea1" rows="4" disabled>{{ $comment->comment }}</textarea>
			</div>
			<hr>
			@endforeach
			<form class="forms-sample" method="POST" action="{{ route('comment.store') }}">
				{{csrf_field()}}
				<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
				<div class="form-group">
					<label for="exampleTextarea1">Reply Ticket</label>
					@if($ticket->status == "open")
					<textarea class="form-control" id="exampleTextarea1" rows="6" name="comment"></textarea>
					@else
					<textarea class="form-control" id="exampleTextarea1" rows="6" name="comment" disabled></textarea>
					@endif
				</div>
				@if($ticket->status == "open")
				<button type="submit" class="btn btn-primary" style="float: right;">Reply</button>
				@else
				<button type="button" class="btn btn-primary" style="float: right;" disabled>Reply</button>
				@endif
			</form>
		</div>
	</div>
</div>
@endsection