@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Manage Groups</h4>
		<div class="row mt-4">
			<div class="col-md-12">
				<ul class="nav nav-tabs tab-simple-styled" role="tablist">
					<li class="nav-item">
                        <a class="nav-link active" id="tab-2-1" data-toggle="tab" href="#tab-digipos" role="tab" aria-controls="tab-digipos" aria-selected="true">
                        <i class="mdi mdi-speedometer"></i>Digipos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-2-2" data-toggle="tab" href="#tab-tcash" role="tab" aria-controls="tab-tcash" aria-selected="false">
                        <i class="mdi mdi-message-outline"></i>TCASH</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-2-3" data-toggle="tab" href="#tab-mytsel" role="tab" aria-controls="tab-mytsel" aria-selected="false">
                        <i class="mdi mdi-message-outline"></i>MY-TSEL</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-2-4" data-toggle="tab" href="#tab-gopay" role="tab" aria-controls="tab-gopay" aria-selected="false">
                        <i class="mdi mdi-bell-outline"></i>GO-PAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-2-5" data-toggle="tab" href="#tab-ovo" role="tab" aria-controls="tab-ovo" aria-selected="false">
                        <i class="mdi mdi-account-outline"></i>OVO</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-2-6" data-toggle="tab" href="#tab-tokopedia" role="tab" aria-controls="tab-tokopedia" aria-selected="false">
                        <i class="mdi mdi-lightbulb-outline"></i>Tokopedia</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-2-7" data-toggle="tab" href="#tab-bukalapak" role="tab" aria-controls="tab-bukalapak" aria-selected="false">
                        <i class="mdi mdi-airplay"></i>Bukalapak</a>
                    </li>
				</ul>
				<div class="tab-content tab-content-basic">
                    <div class="tab-pane fade active show" id="tab-digipos" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <!-- <a href="{{ route('groups.edit', 1) }}" class="btn btn-outline-success">Edit</a> -->
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="tab-tcash" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <!-- <a href="{{ route('groups.edit', 1) }}" class="btn btn-outline-success">Edit</a> -->
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="tab-mytsel" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <!-- <a href="{{ route('groups.edit', 1) }}" class="btn btn-outline-success">Edit</a> -->
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="tab-gopay" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <!-- <a href="{{ route('groups.edit', 1) }}" class="btn btn-outline-success">Edit</a> -->
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="tab-ovo" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <!-- <a href="{{ route('groups.edit', 1) }}" class="btn btn-outline-success">Edit</a> -->
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="tab-tokopedia" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <!-- <a href="{{ route('groups.edit', 1) }}" class="btn btn-outline-success">Edit</a> -->
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="tab-bukalapak" role="tabpanel" aria-labelledby="tab-bukalapak">
                        <div class="row">
                            <div class="col-sm-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add New Group</button>
                            </div>
                        </div>
						<div id="" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                                    No.
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Group Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                                    Limit Account
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 52.6667px;" aria-label="Actions: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>          
                                            <tr role="row">
                                                <td class="sorting_1">1</td>
                                                <td>Group Name 1</td>
                                                <td>100</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr role="row">
                                                <td class="sorting_1">2</td>
                                                <td>Group Name 2</td>
                                                <td>60</td>
                                                <td>
                                                    <a href="{{ route('groups.show', 1) }}" class="btn btn-outline-primary">View</a>
                                                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editModal" data-id="1">Edit</button>
                                                    <a href="{{ route('groups.destroy', 1) }}" class="btn btn-outline-danger">Delete</a>
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
                    <input type="text" class="form-control" name="name" id="name" placeholder="Nama Grup" value="{{ old('name') }}" required>
                    @if ($errors->first('name'))
                        <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="account_limit">Account Limit</label>
                    <input type="text" class="form-control" name="account_limit" id="account_limit" placeholder="Limit Akun" value="{{ old('account_limit') }}" required>
                    @if ($errors->first('account_limit'))
                        <small class="text-danger">{{ $errors->first('account_limit') }}</small>
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
        <form class="forms-sample" method="POST" action="{{ route('groups.update', 1) }}">
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
                    <label for="account_limit">Account Limit</label>
                    <input type="text" class="form-control" name="account_limit" id="account_limit" placeholder="Limit Akun" value="{{ old('account_limit') }}" required>
                    @if ($errors->first('account_limit'))
                        <small class="text-danger">{{ $errors->first('account_limit') }}</small>
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