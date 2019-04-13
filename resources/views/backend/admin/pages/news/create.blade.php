@extends('backend.app')

@section('content')
<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">News Form</h4>

        <form class="forms-sample" method="POST" action="/admin/news" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="nameInput">Title</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Title" name="title">
            @if ($errors->has('title'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('title') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="descriptionInput">Content</label>
            <textarea class="form-control" id="descriptionInput" rows="2" name="content"></textarea>
            @if ($errors->has('content'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('content') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label>File upload</label>
            <input type="file" class="file-upload-default" name="image">
            <div class="input-group col-xs-12">
              <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
              <span class="input-group-append">
                <button class="file-upload-browse btn btn-info" type="button">Upload</button>
              </span>
            </div>
            @if ($errors->has('image'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('image') }}</label>
            @endif
          </div>
          <button type="submit" class="btn btn-primary mr-2" style="float: right;">Submit</button>
          <a class="btn btn-light" href="/admin/news">Cancel</a>
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
