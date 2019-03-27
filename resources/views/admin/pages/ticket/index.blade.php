@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Ticket List</h4>
			<a href="{{route('ticket.create')}}" class="btn btn-success mr-2" style="color: white">New Ticket</a>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Category</th>
						<th>Title</th>
						<th>Status</th>
						<th>Last Update</th>
					</tr>
				</thead>
				<tbody>
					@foreach($tickets as $ticket)
					<tr class="clickable-row" data-href="{{route('ticket.show', $ticket->ticket_id)}}">
						<td>{{$ticket->category->name}}</td>
						<td>{{$ticket->title}}</td>
						<td>
							@if($ticket->status == 'open')
							<label class="badge badge-success">{{$ticket->status}}</label>
							@else
							<label class="badge badge-danger">{{$ticket->status}}</label>
							@endif
						</td>
						<td>{{$ticket->updated_at}}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
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