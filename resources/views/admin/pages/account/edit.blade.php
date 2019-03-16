@extends('admin.app')

@section('content')
    <h3><i class="mdi mdi-cash-usd"></i>Deposit Saldo</h3>
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form class="forms-sample" method="POST" action="{{ route('deposit-store') }}">
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