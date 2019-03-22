@extends('admin.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Manage Accounts</h4>
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add Account</button>
            </div>
        </div>
		<div class="row mt-4">
			<div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dropdown">
                            <small>Pilih Group :</small>
                            <button class="btn btn-sm btn-outline-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ $filterBy }}
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('accounts', $service) }}">All Account</a>
                                @foreach($groups as $group)
                                <a class="dropdown-item" href="{{ route('accounts.group', ['service' => $service, 'group_id' => $group->id]) }}">{{ $group->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <table id="group-account" class="table dataTable no-footer" role="grid" aria-describedby="order-listing_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 55.3167px;" aria-sort="ascending" aria-label="Order #: activate to sort column descending">
                                        No.
                                    </th>
                                    <!-- <th class="sorting" tabindex="0" aria-controls="order-listing" rowspan="1" colspan="1" style="width: 99.1167px;" aria-label="Purchased On: activate to sort column ascending">
                                        Account Name
                                    </th> -->
                                    <th class="sorting" >
                                        Phone
                                    </th>
                                    <th class="sorting" >
                                        Balance
                                    </th>
                                    <th class="sorting" >
                                        Expired Date
                                    </th>
                                    <th class="sorting" >
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody>          
                                @php ($no = 1)
                                @foreach ($accounts as $account)
                                <tr role="row">
                                    <td class="sorting_1">{{ $no }}</td>
                                    <!-- <td>Account Name 1</td> -->
                                    <td>{{ $account->phone }}</td>
                                    <td>{{ $account->balance }}</td>
                                    <td>{{ date('d - m - Y', strtotime($account->expired_date)) }}</td>
                                    <td>
                                        <button type="button" class="btn btn-move btn-outline-primary" data-toggle="modal" data-target="#moveModal"  data-phone="{{ $account->phone }}" data-group="{{ $account->group_id }}">Move</button>
                                        <button type="button" class="btn btn-update btn-outline-success" data-toggle="modal" data-target="#updateModal"  data-phone="{{ $account->phone }}" data-group="{{ $account->group_id }}" data-license="{{ Auth::user()->license_key }}">Update OTP</button>
                                        <!-- <a href="{{ route('accounts.destroy', 1) }}" class="btn btn-outline-danger">Delete</a> -->
                                    </td>
                                </tr>
                                @php ($no++)
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
			</div>
		</div>
	</div>
</div>

<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="forms-sample" method="POST" action="{{ route('accounts.store', $service) }}">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phoneadd" name="phone" placeholder="No. Telepon" value="{{ old('phone') }}" require>
                    @if ($errors->first('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
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

<!-- move modal -->
<div class="modal fade" id="moveModal" tabindex="-1" role="dialog" aria-labelledby="moveModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Move Account</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="forms-sample" method="POST" action="{{ route('accounts.move', $service) }}">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control phoneMove" placeholder="No. Telepon" value="{{ old('phone') }}" disabled>
                    <input type="hidden" class="phoneMove" name="phone" name="phone" value="{{ old('phone') }}">
                    @if ($errors->first('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="oldGroup">Old Group</label>
                    <input type="text" class="form-control oldGroupMove" placeholder="Grup Lama" value="{{ old('oldGroup') }}" disabled>
                    <input type="hidden" class="oldGroupMove" name="oldGroup" value="{{ old('oldGroup') }}">
                    @if ($errors->first('oldGroup'))
                        <small class="text-danger">{{ $errors->first('oldGroup') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="newGroup">New Group</label>
                    <select class="form-control" name="newGroup" id="newGroupMove">
                        <option value="" disabled selected>Grup Baru</option>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->first('newGroup'))
                        <small class="text-danger">{{ $errors->first('newGroup') }}</small>
                    @endif
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Move</button>
            </div>
        </form>
    </div>
  </div>
</div>

<!-- send otp modal -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Update Acount</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form class="forms-sample">
            <div class="modal-body">
                @csrf
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone-update" name="phone" placeholder="No. Telepon" value="{{ old('phone') }}" require>
                    @if ($errors->first('phone'))
                        <small class="text-danger">{{ $errors->first('phone') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="group-update">Group</label>
                    <input type="text" class="form-control" id="group-update" name="group" placeholder="Group ID" value="{{ old('group') }}" require>
                    @if ($errors->first('group'))
                        <small class="text-danger">{{ $errors->first('group') }}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="license">Lisensi</label>
                    <input type="text" class="form-control" id="license-update" name="license" placeholder="Lisensi" value="{{ old('license') }}" require>
                    @if ($errors->first('license'))
                        <small class="text-danger">{{ $errors->first('license') }}</small>
                    @endif
                </div>
                <div id="form-verify">
                    <hr>
                    <div class="form-group">
                        <label for="token">Token</label>
                        <input type="text" class="form-control" id="token-update" name="token" placeholder="Token" value="{{ old('token') }}" require>
                        @if ($errors->first('token'))
                            <small class="text-danger">{{ $errors->first('token') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="otp-update">Masukkan Kode OTP</label>
                        <input type="text" class="form-control" id="otp-update" name="otp-update" placeholder="Kode OTP" value="{{ old('otp-update') }}" require>
                        @if ($errors->first('otp-update'))
                            <small class="text-danger">{{ $errors->first('otp-update') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="btn-update-otp">Update</button>
                <button type="button" class="btn btn-success" id="btn-verify-otp">Verify</button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

@section('custom_js')
<script>
    // hide verify form and button
    $('#btn-verify-otp').hide()
    $('#form-verify').hide()

    $('.btn-move').click(function(){
        let groupId = $(this).data('group')
        let phone = $(this).data('phone')
        console.log(groupId + phone)
        $('.phoneMove').val(phone)
        $('.oldGroupMove').val(groupId)
    })

    $('.btn-update').click(function(){
        let groupId = $(this).data('group')
        let phone = $(this).data('phone')
        let license = $(this).data('license')
        $('#phone-update').val(phone)
        $('#license-update').val(license)
        $('#group-update').val(groupId)
    })

    $('#btn-update-otp').click(function(){
        let phone = $('#phone-update').val()
        let license = $('#license-update').val()
        let groupId = $('#group-update').val()
        console.log(phone + " " + license + " " +  groupId)
        $.post('https://api.gatewize.com/devel-gopay/account/'+ license +'/'+ groupId +'/'+ phone +'/update', function(data){
            console.log(data)
            if(data.status){
                $('#token-update').val(data.token)
                $('#btn-update-otp').hide()
                $('#btn-verify-otp').show()
                $('#form-verify').show()
            } else {
                swal({
                    title: 'Update Gagal',
                    text: "Silahkan coba lagi",
                    icon: 'error',
                })
            }
        })
    })

    $('#btn-verify-otp').click(function(){
        let phone = $('#phone-update').val()
        let license = $('#license-update').val()
        let groupId = $('#group-update').val()
        let token = $('#token-update').val()
        let otp = $('#otp-update').val()
        $.post('https://api.gatewize.com/devel-gopay/account/'+ license +'/'+ groupId +'/'+ phone +'/verify',
        {   token: token, 
            otp: otp,
        }, function(data){
            if(data.status){
                swal({
                    title: 'Berhasil',
                    text: "Berhasil update otp",
                    icon: 'success',
                })

                $('#btn-verify-otp').hide()
                $('#form-verify').hide()
                $('#btn-update-otp').show()
            } else {
                swal({
                    title: 'Update Gagal',
                    text: "Silahkan coba lagi",
                    icon: 'error',
                })
            }
        })
    })
</script>
@endsection