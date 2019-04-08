@extends('backend.app')

@section('content')
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Manage Accounts Digipos</h4>
        <div class="row">
            <div class="col-sm-12">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal" data-id="1">Add Account</button>
            </div>
        </div>
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
                                        Active
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
                                    <td>{{ $account['phone'] }}</td>
                                    <td>{{ $account['balance'] }}</td>
                                    <td>{{ date('d - m - Y', strtotime($account['expired_date'])) }}</td>
                                    @if($account['enabled'] == 1)
                                    <td>Aktif</td>
                                    @else
                                    <td>Tidak Aktif</td>
                                    @endif
                                    <td>
                                        <button type="button" class="btn btn-update btn-primary" data-toggle="modal" data-target="#updateModal"  data-phone="{{ $account['phone'] }}" data-group="{{ $account['group_id'] }}" data-license="{{ Auth::user()->license_key }}">Update OTP</button>
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
                    <label for="phone">Username Digipos</label>
                    <input type="text" class="form-control" id="phoneadd" name="phone" placeholder="Username Digipos" value="{{ old('phone') }}" require>
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
                <input type="hidden" id="license-update" name="license">
                <input type="hidden" id="phone-update" name="phone">
                <div class="form-group">
                    <label for="password-update">Masukkan Password</label>
                    <input type="text" class="form-control" id="password-update" name="password-update" placeholder="Password" value="{{ old('password-update') }}" require>
                </div>
                <hr>
                <div id="form-verify">
                <div class="form-group">
                    <label for="otp-update">Token</label>
                    <input type="text" class="form-control" id="token-update" name="token-update" placeholder="Token" require>
                </div>
                <div class="form-group">
                    <label for="otp-update">Masukkan Kode OTP</label>
                    <input type="text" class="form-control" id="otp-update" name="otp-update" placeholder="Kode OTP" require>
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
    hideOTP()
    // hide otp form
    function hideOTP(params) {
        $('#btn-verify-otp').hide();
        $('#form-verify').hide();
        $('#btn-update-otp').show()
        $('#token-update').val("")
        $('#password-update').val("")
        $('#otp-update').val("")
    }

    $('.btn-update').click(function(){
        let phone = $(this).data('phone')
        let license = $(this).data('license')
        $('#phone-update').val(phone)
        $('#license-update').val(license)
    })

    $('#btn-update-otp').click(function(){
        let phone = $('#phone-update').val()
        let license = $('#license-update').val()
        let password = $('#password-update').val()
        console.log(phone + " " + license + " " + password)
        $.post('https://api.gatewize.com/devel-digipos/account/'+ license +'/'+ phone +'/update', {password: password}, function(data){
            console.log(data)
            if(data.status){
                $('#btn-verify-otp').show()
                $('#form-verify').show()
                $('#btn-update-otp').hide()
                $('#token-update').val(data.data.token)
            } else {
                swal({
                    title: 'Update Failed',
                    text: data.message,
                    icon: 'error',
                })
            }
        })
    })

    $('#btn-verify-otp').click(function(){
        let phone = $('#phone-update').val()
        let license = $('#license-update').val()
        let otp = $('#otp-update').val()
        let token = $('#token-update').val()
        $.post('https://api.gatewize.com/devel-digipos/account/'+ license +'/'+ phone +'/verify',
            {   token: token,
                otp: otp,
            }, function(data){
                if(data.status){
                    swal({
                        title: 'Berhasil',
                        text: "Berhasil update otp",
                        icon: 'success',
                    })
                    hideOTP()
                } else {
                    swal({
                        title: 'Update Gagal',
                        text: data.message,
                        icon: 'error',
                    })
                    hideOTP()
                }
            })
    })
</script>
@endsection
