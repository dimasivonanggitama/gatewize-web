@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">service table</h4>
        <div class="row">
            <a class="btn btn-primary" href="/admin/services/create">Add New Service</a>
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Url</th>
                            <th>Settings</th>
                            <th>Transaction Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                        <tr>
                            <td>{{$service->name}}</td>
                            <td>{{$service->url}}</td>
                            <td>{{$service->settings}}</td>
                            <td>{{$service->trx_type}}</td>
                            <td>{{$service->is_active ? 'Active' : 'Non Active'}}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#enableModal-{{$service->id}}" style="padding: 0.5rem;">{{$service->is_active ? 'Disable' : 'Enable'}}</button>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{$service->id}}" style="padding: 0.5rem;">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$service->id}}" style="padding: 0.5rem;">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$service->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/services/{{$service->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" id="btn-update">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">{{$service->name}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="/admin/services/{{$service->id}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body">
                                            <div class="form-group row">
                                                <label class="col-sm-3 col-form-label" for="exampleFormControlSelect1">Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="name" value="{{$service->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Url</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="url" value="{{$service->url}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="exampleFormControlSelect1" class="col-sm-3 col-form-label">Trx Type</label>
                                                <div class="col-sm-9">
                                                    <input type="text" name="trx_type" value="{{$service->trx_type}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleTextarea1">Settings</label>
                                                <textarea class="form-control" id="exampleTextarea1" rows="6" name="settings">{{$service->settings}}</textarea>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Back</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="enableModal-{{$service->id}}" tabindex="-1" role="dialog" aria-labelledby="enableModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you sure {{$service->is_active ? 'disabling' : 'enabling'}} "{{$service->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/services/{{$service->id}}/activation">
                                            @csrf
                                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary" id="btn-update">Yes</button>
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
