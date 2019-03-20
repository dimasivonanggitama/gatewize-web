@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Manage Groups</h4>
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add Group</button>
            </div>
        </div>
		<div class="row mt-4">
			<div class="col-md-12">
                <div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="group-table" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc">
                                            No.
                                        </th>
                                        <th>
                                            Group Name
                                        </th>
                                        <th>
                                            Limit Account
                                        </th>
                                        <th>
                                            Actions
                                        </th>
                                    </tr>
                                </thead>
                                
                                <tbody>     
                                    @foreach ($groups as $group)  
                                    <tr role="row">
                                        <td class="sorting_1">1</td>
                                        <td>{{ $group->name }}</td>
                                        <td>{{ $group->limit_account }}</td>
                                        <td>
                                            <a href="{{ route('groups.show', ['service' => $service, 'id' => $group->id]) }}" class="btn btn-outline-primary">View</a>
                                            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                            <a href="{{ route('groups.destroy', ['service' => $service, 'id' => $group->id]) }}" class="btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="createModalLabel">Add Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="forms-sample" method="POST" action="{{ route('groups.store') }}">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Group Name</label>
                    <input type="hidden" name="service" value="{{ $service }}">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Grup" value="{{ old('name') }}" required>
                    @if ($errors->first('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="limit">Account Limit</label>
                    <input type="text" class="form-control" name="limit" id="limit" placeholder="Limit Akun" value="{{ old('limit') }}" required>
                    @if ($errors->first('limit'))
                        <small class="text-danger">{{ $errors->first('limit') }}</small>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Group</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="forms-sample" method="POST" action="{{ route('groups.update', ['service' => $service, 'id' => 1]) }}">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Group Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Grup" value="{{ old('name') }}" required>
                    @if ($errors->first('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="limit">Account Limit</label>
                    <input type="text" class="form-control" name="limit" id="limit" placeholder="Limit Akun" value="{{ old('limit') }}" required>
                    @if ($errors->first('limit'))
                        <small class="text-danger">{{ $errors->first('limit') }}</small>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection