@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Ticket table</h4>
        <div class="row">
            <a class="btn btn-primary" href="/admin/tickets/create">Add Ticket</a>
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Category</th>
                            <th>TicketID</th>
                            <th>Title</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->user->fullname}}</td>
                            <td>{{optional($ticket->category)->name}}</td>
                            <td>{{$ticket->ticket_id}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>
                                @if($ticket->priority == 'high')
                                <label class="badge badge-danger">{{$ticket->priority}}</label>
                                @elseif($ticket->priority == 'medium')
                                <label class="badge badge-warning">{{$ticket->priority}}</label>
                                @else
                                <label class="badge badge-primary">{{$ticket->priority}}</label>
                                @endif
                            </td>
                            <td>
                                @if($ticket->status == 'open')
                                <label class="badge badge-success">{{$ticket->status}}</label>
                                @else
                                <label class="badge badge-info">{{$ticket->status}}</label>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#viewModal-{{$ticket->id}}" style="padding: 0.5rem;">View</button>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal-{{$ticket->id}}" style="padding: 0.5rem;">Comment</button>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#closeModal-{{$ticket->id}}" style="padding: 0.5rem;">Close</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$ticket->id}}" style="padding: 0.5rem;">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$ticket->title}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/tickets/{{$ticket->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" id="btn-update">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="viewModal-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="viewModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{$ticket->title}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">User</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="" value="{{$ticket->user->fullname}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Priority</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="" disabled value="{{$ticket->priority}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea1">Message</label>
                                            <textarea class="form-control" id="exampleTextarea1" rows="6" name="message" disabled>{{$ticket->message}}</textarea>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleFormControlSelect1" class="col-form-label col-sm-3">Status</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="" disabled="" value="{{$ticket->status}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Back</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="commentModal-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="commentModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form action="/comment" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{$ticket->id}}">
                                        <div class="modal-header">
                                            <h5 class="modal-title">{{$ticket->title}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">User</label>
                                                <div class="col-sm-9">
                                                    <input type="text" value="{{$ticket->user->fullname}}" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Message</label>
                                                <textarea class="form-control" id="exampleTextarea1" rows="6" disabled>{{$ticket->message}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Reply</label>
                                                <textarea class="form-control" id="exampleTextarea1" rows="6" name="comment"></textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Back</button>
                                            <button type="submit" class="btn btn-primary mr-2" style="float: right;">Comment</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="closeModal-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="closeModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user closing "{{$ticket->title}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/tickets/{{$ticket->ticket_id}}/close">
                                            @csrf
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="btn-update">Close</button>
                                        </form>
                                    </div>
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
<script src="{!! asset('template/backend/assets/js/shared/data-table.js') !!}"></script>

<script src="{{ asset('template/backend/assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>
@endsection
