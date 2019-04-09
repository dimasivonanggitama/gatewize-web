@extends('backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Ticket List</h4>
		<button type="button"  class="btn btn-success mr-2" style="color: white" data-toggle="modal" data-target="#createModal">New Ticket</button>
		<!-- <a href="{{route('ticket.create')}}" class="btn btn-success mr-2" style="color: white">New Ticket</a> -->
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Category</th>
						<th>Title</th>
						<th>Status</th>
						<th>Last Update</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tickets as $ticket)
					<tr>
						<td>#{{$ticket->ticket_id}}</td>
						<td>{{$ticket->category->name}}</td>
						<td>{{$ticket->title}}</td>
						<td>
							@if($ticket->status == 'open')
							<label class="badge badge-success">{{$ticket->status}}</label>
							@elseif($ticket->status == 'closed')
							<label class="badge badge-danger">{{$ticket->status}}</label>
							@else
							<label class="badge badge-primary">{{$ticket->status}}</label>
							@endif
						</td>
						<td>{{$ticket->updated_at}}</td>
						<td>
							@if($ticket->status == "open")
							<form action="{{route('ticket.close', $ticket->ticket_id)}}" method="POST" class="inline">
								@csrf
								<a href="{{route('ticket.show', $ticket->ticket_id)}}" class="btn btn-primary">View</a>
								<button type="submit" class="btn btn-danger">Close</button>
							</form>
							@else
								<a href="{{route('ticket.show', $ticket->ticket_id)}}" class="btn btn-primary">View</a>
							@endif
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
	<div class="modal-dialog" role="document" style="margin-top: 10px;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Open Ticket</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
				@endif
			</div>
			<form class="forms-sample" action="{{route('ticket.create')}}" method="POST">
				<div class="modal-body">
					<!-- <h4 class="card-title">Open Ticket</h4> -->
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
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Open Ticket</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection

@section('custom_js')
<script>
	$(".clickable-row").click(function() {
		window.location = $(this).data("href");
	});
</script>
@endsection