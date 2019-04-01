@extends('admin.app')

@section('content')
<div class="row">
  <div class="col-md-6 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Product Form</h4>

        <form class="forms-sample" method="POST" action="/admin/products/create" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Service</label>
            <select class="js-example-basic-single" style="width:100%" name="service_id">
              @foreach($services as $service)
              <option value="{{$service->id}}">{{$service->name}}</option>
              @endforeach
            </select>
            @if ($errors->has('service_id'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('service_id') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="codeInput">Code</label>
            <input type="text" class="form-control" id="codeInput" placeholder="Product Code" name="code"> 
            @if ($errors->has('code'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('code') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="nameInput">Name</label>
            <input type="text" class="form-control" id="nameInput" placeholder="Product Name" name="name"> 
            @if ($errors->has('name'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('name') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="descriptionInput">Description</label> 
            <textarea class="form-control" id="descriptionInput" rows="2" name="description"></textarea> 
            @if ($errors->has('description'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('description') }}</label>
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
          <div class="form-group">
            <label for="priceInput">Price</label>
            <input type="number" class="form-control" id="priceInput" placeholder="in Rp." name="price"> 
            @if ($errors->has('price'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('price') }}</label>
            @endif
          </div>                    
          <div class="form-group">
            <label>Termin</label>
            <select class="js-example-basic-single" style="width:100%" name="termin">
              <option value="days">Days</option>
              <option value="months">Months</option>
              <option value="years">Years</option>
            </select>
            @if ($errors->has('termin'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('termin') }}</label>
            @endif
          </div>
          <div class="form-group">
            <label for="slotInput">Slot</label>
            <input type="number" class="form-control" id="slotInput" placeholder="Slot Amount" name="slot"> 
            @if ($errors->has('slot'))
            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('slot') }}</label>
            @endif
          </div>
          <button type="submit" class="btn btn-success mr-2" style="float: right;">Submit</button>
          <a class="btn btn-light" href="/admin/products">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
@section('custom_js')

<script src="{{ asset('theme/StarAdmin/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('theme/StarAdmin/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('theme/StarAdmin/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('theme/StarAdmin/js/shared/select2.js') }}"></script>
@endsection