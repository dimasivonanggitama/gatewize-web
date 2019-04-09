@extends('backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Manage Groups Ovo</h4>
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
                                @php ($no = 1)
                                @foreach ($groups as $group)
                                <tr role="row">
                                    <td class="sorting_1">{{ $no }}</td>
                                    <td>{{ $group['name'] }}</td>
                                    <td>{{ $group['limit_account'] }}</td>
                                    <td>
                                        <a href="{{ route('accounts.group', ['service' => 'ovo', 'group_id' => $group['id']]) }}" class="btn btn-primary">View</a>
                                        @if($group['is_default'] != 1)
                                        <button type="button" class="btn btn-success btn-edit" data-toggle="modal" data-target="#editModal" data-id="{{ $group['id'] }}" data-name="{{ $group['name'] }}" data-limit="{{ $group['limit_account'] }}">Edit</button>

                                        <form class="form-inline" method="POST" action="{{ route('groups.destroy', ['service' => 'ovo']) }}" style="margin:none;display:inline;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <input type="hidden" name="id" value="{{ $group['id'] }}">
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        @endif
                                        <button type="button" class="btn btn-refresh btn-primary" data-id="{{ $group['id'] }}">Refresh</button>
                                        <button type="button" class="btn btn-success btn-primary" data-toggle="modal" data-target="#refreshModal" >Refresh Session</button>
                                        <!-- <a href="#" class="btn btn-success">Redeem Promo</a> -->
                                    </td>
                                </tr>
                                @php ($no = $no + 1)
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
                    <input type="hidden" name="service" value="ovo">
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
        <form class="forms-sample" id="redeem-form" method="POST" action="{{ route('groups.update', ['service' => 'ovo']) }}">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="name">Group Name</label>
                    <input type="hidden" name="id" value="" id="id-edit">
                    <input type="text" class="form-control" name="name" id="name-edit" placeholder="Nama Grup" value="{{ old('name') }}" required>
                    @if ($errors->first('name'))
                    <small class="text-danger">{{ $errors->first('name') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="limit">Account Limit</label>
                    <input type="text" class="form-control" name="limit" id="limit-edit" placeholder="Limit Akun" value="{{ old('limit') }}" required>
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

<div class="modal fade" id="refreshModal" tabindex="-1" role="dialog" aria-labelledby="refreshModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Refresh Session</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="name">PIN</label>
                <input type="password" class="form-control" name="pin" id="pin-edit" placeholder="123456" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success" id="refresh-btn" data-group="{{ $group['id'] }}" data-license="{{Auth::user()->license_key}}">Refresh</button>
        </div>
    </div>
</div>
</div>
@endsection

@section('custom_js')
<script>
    $('.btn-edit').click(function(){
        let id = $(this).data('id')
        let name = $(this).data('name')
        let limit = $(this).data('limit')

        $('#id-edit').val(id)
        $('#name-edit').val(name)
        $('#limit-edit').val(limit)
    })

    $('.btn-refresh').click(function(){
        let id = $(this).data('id')
        swal({
            title: 'Refresh Status',
            text: "Apakah anda ingin merefresh status akun?",
            icon: 'info',
            buttons: {
                cancel: {
                    text: "Cancel",
                    value: false,
                    visible: true,
                    className: "btn btn-danger",
                    closeModal: true,
                },
                confirm: {
                    text: "OK",
                    value: true,
                    visible: true,
                    className: "btn btn-primary",
                    closeModal: true
                }
            }
        }).then((result) => {
            if(result){
                location.href = "{{ url('/accounts/group') }}/" + id + "/ovo/"
            }
        })
    })
    $('#refresh-btn').click(function(){
        let pin = $('input#pin-edit').val();
        let license = $(this).data('license');
        let groupId = $(this).data('group');
        $.get('https://api.gatewize.com/devel-ovo/refresh/'+license+'/'+groupId+'/'+pin+'/session', function(data){
            let url = window.location.href.split('/');
            let service = url[url.length - 1];
            window.location = window.location.origin + '/accounts/group/' + groupId + '/' + service;
        })
    })
</script>
@endsection
