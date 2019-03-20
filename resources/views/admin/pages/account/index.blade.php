@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Manage Accounts</h4>
		<div class="row mt-4">
			<div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <table id="group-account" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                        No.
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                        Account Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                        Phone
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                        Balance
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>          
                                <tr role="row">
                                    <td class="sorting_1">1</td>
                                    <td>Account Name 1</td>
                                    <td>08123456789</td>
                                    <td>1000</td>
                                    <td>
                                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                        <a href="{{ route('accounts.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
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
        <form class="forms-sample" method="POST" action="{{ route('deposit-store') }}">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Account Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Akun" value="{{ old('name') }}" required>
                    @if ($errors->first('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone" placeholder="No. Telepon" value="{{ old('phone') }}" required>
                    @if ($errors->first('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
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