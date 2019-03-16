@extends('admin.app')

@section('content')
    <h3><i class="mdi mdi-cash-usd"></i>Update Group</h3>
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('groups.update', 1) }}">
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
                                <button type="submit" class="btn btn-success mr-2">Update</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection