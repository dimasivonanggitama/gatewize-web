@extends('backend.app')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Service Form</h4>

        <form class="forms-sample" method="POST" action="/admin/services" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nameInput">Name</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Name" name="name">
            @if ($errors->has('name'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('name') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="descriptionInput">Url</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Url" name="url">
            @if ($errors->has('url'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('url') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="descriptionInput">Trx Type</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Transaction Type" name="trx_type">
            @if ($errors->has('trx_type'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('trx_type') }}</label>
            @endif
          </div>

          <div class="form-group">
            <label for="descriptionInput">Settings</label>
            <textarea class="form-control" placeholder="Settings" name="settings"></textarea>
            @if ($errors->has('settings'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('settings') }}</label>
            @endif
          </div>

          <button type="submit" class="btn btn-primary mr-2" style="float: right;">Submit</button>
          <a class="btn btn-light" href="/admin/services">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom_js')

<script src="{{ asset('template/backend/assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>
@endsection
