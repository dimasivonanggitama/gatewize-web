@extends('backend.app')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
                @endif
                <h3 class="card-title">
                {{$ticket->title}}
                @if($ticket->status == 'open')
                    <label class="badge badge-primary mt-1">{{$ticket->status}}</label>
                @elseif($ticket->status == 'answered')
                    <label class="badge badge-success mt-1">{{$ticket->status}}</label>
                @else
                    <label class="badge badge-danger mt-1">{{$ticket->status}}</label>
                @endif
                </h3>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="exampleInputPassword2" class="col-form-label">Category</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="exampleInputPassword2" value="{{$ticket->category->name}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <label for="exampleInputPassword2" class="col-form-label">Created at</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="exampleInputPassword2" value="{{$ticket->created_at}}" disabled>
                    </div>
                    <div class="col-sm-2">
                        <label for="exampleInputPassword2" class="col-form-label">Author</label>
                    </div>
                    <div class="col-sm-2">
                        <input type="text" class="form-control" id="exampleInputPassword2" value="{{$ticket->user->fullname}}" disabled>
                    </div>
                    <!-- <div class="col-sm-2">
                        <label for="exampleInputPassword2" class="col-form-label mr-2">Status</label>
                    </div> -->
                </div>
                <div class="form-group mt-5">
                    <label for="exampleTextarea1">Message</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="6" name="comment" disabled>{{$ticket->message}}</textarea>
                </div>
                <label>Comments</label>
                <hr>

                @if(count($comments) > 0)
                    @foreach ($comments as $comment)
                    <div class="form-group">
                            <label for="exampleTextarea1">{{ $comment->user->fullname }} - {{ $comment->created_at->diffForHumans() }}</label>
                            <textarea class="form-control" id="exampleTextarea1" rows="4" disabled>{{ $comment->comment }}</textarea>
                    </div>
                    <hr>
                    @endforeach
                @else
                    <div class="form-group text-center">
                            <label for="exampleTextarea1">Belum ada balasan</label>
                    </div>
                    <hr>
                @endif

            </div>
        </div>
    </div>
    @if($ticket->status != 'closed')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="card-title">Tambahkan Jawaban</div>
                <form class="forms-sample" method="POST" action="/admin/tickets/comment">
                    {{csrf_field()}}
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <div class="form-group">
                        <label for="exampleTextarea1">Reply Ticket</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="6" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="float: right;">Reply</button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
