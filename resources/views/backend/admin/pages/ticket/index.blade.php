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
                            <th>Message</th>
                            <th>Priority</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->user->name}}</td>
                            <td>{{$ticket->category->name}}</td>
                            <td>{{$ticket->ticket_id}}</td>
                            <td>{{$ticket->title}}</td>
                            <td style="white-space: normal;">{{$ticket->message}}</td>
                            <td>
                                @if($status->priority == 'high')
                                <label class="badge badge-danger">{{$status->priority}}</label>
                                @elseif($status->priority == 'medium')
                                <label class="badge badge-warning">{{$status->priority}}</label>
                                @else
                                <label class="badge badge-default">{{$status->priority}}</label>
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
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{$ticket->id}}" style="padding: 0.5rem;">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$ticket->id}}" style="padding: 0.5rem;">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$ticket->name}}" ?</h5>
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
                        <div class="modal fade" id="editModal-{{$ticket->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$ticket->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="forms-sample" method="POST" action="/admin/tickets/{{$ticket->id}}" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          @csrf
                                          @method('PUT')
                                          <div class="form-group">
                                            <label for="exampleInputName1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputName1" name="title">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">User</label>
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="user_id">
                                                <option default value="{{$ticket->user_id}}">{{$ticket->user->name}}</option>
                                                @foreach($users as $user)
                                                <option value="{{$user->id}}">{{$user->fullname}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Category</label>
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="category_id">
                                                <option default value="{{$ticket->category_id}}">{{$ticket->category->name}}</option>
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
                                            <textarea class="form-control" id="exampleTextarea1" rows="6" name="message">{{$ticket->message}}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Status</label>
                                            <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="status">
                                                <option value="open">Open</option>
                                                <option value="closed">Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a class="btn btn-light" data-miss="modal">Cancel</a>
                                        <button type="submit" class="btn btn-success mr-2" style="float: right;">Update</button>
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
<script src="{!! asset('template/backend/assets/js/shared/data-table.js') !!}"></script>

<script src="{{ asset('template/backend/assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>
@endsection