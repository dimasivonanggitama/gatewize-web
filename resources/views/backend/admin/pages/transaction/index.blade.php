@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">transaction table</h4>
        <div class="row">
            <!-- <a class="btn btn-primary" href="/admin/transactions/create">Add transaction</a> -->
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transactions as $transaction)
                        <tr>
                            <td>{{$transaction->user->fullname}}</td>
                            <td>{{$transaction->product->name}}</td>
                            <td>Rp. {{number_format($transaction->product->price,0)}}</td>
                            <td>{{$transaction->created_at}}</td>
                            <td>
                                @if($transaction->status == 'requested')
                                <label class="badge badge-info">{{$transaction->status}}</label>
                                @else
                                <label class="badge badge-success">{{$transaction->status}}</label>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#approveModal-{{$transaction->id}}" style="padding: 0.5rem;">Approve</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$transaction->id}}" style="padding: 0.5rem;">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you sure delete {{$transaction->user->fullname.'for'.$transaction->product->name}} ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/transactions/{{$transaction->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" id="btn-update">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="approveModal-{{$transaction->id}}" tabindex="-1" role="dialog" aria-labelledby="approveModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you sure approve {{$transaction->user->fullname.' for '.$transaction->product->name}} ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/transactions/{{$transaction->id}}">
                                            @csrf
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="btn-update">Approve</button>
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