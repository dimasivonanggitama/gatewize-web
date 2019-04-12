@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Product table</h4>
        <div class="row">
            <a class="btn btn-primary" href="/admin/products/create">Add New Product</a>
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Termin</th>
                            <th>Slot</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->code}}</td>
                            <td>{{$product->termin}}</td>
                            <td>{{$product->slot}}</td>
                            <td>Rp. {{number_format($product->price, 0)}}</td>
                            <td style="white-space: normal;">{{$product->description}}</td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{$product->id}}" style="padding: 0.5rem;">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$product->id}}" style="padding: 0.5rem;">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$product->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/products/{{$product->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" id="btn-update">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal-{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$product->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="forms-sample" method="POST" action="/admin/products/{{$product->id}}">
                                        <div class="modal-body">
                                          @csrf
                                          {{method_field('PUT')}}
                                          <div class="form-group">
                                            <label>Service</label>
                                            <select class="js-example-basic-single" style="width:100%" name="service_id" value="{{$product->service->name}}">
                                              <option value="{{$product->service->id}}" selected>{{$product->service->name}}</option>
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
                                        <input type="text" class="form-control" id="codeInput" name="code" value="{{$product->code}}"> 
                                        @if ($errors->has('code'))
                                        <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('code') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="nameInput">Name</label>
                                        <input type="text" class="form-control" id="nameInput" name="name" value="{{$product->name}}"> 
                                        @if ($errors->has('name'))
                                        <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('name') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="descriptionInput">Description</label> 
                                        <textarea class="form-control" id="descriptionInput" rows="2" name="description">{{$product->description}}</textarea> 
                                        @if ($errors->has('description'))
                                        <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('description') }}</label>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="priceInput">Price</label>
                                        <input type="number" class="form-control" id="priceInput" placeholder="in Rp." name="price" value="{{$product->price}}"> 
                                        @if ($errors->has('price'))
                                        <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('price') }}</label>
                                        @endif
                                    </div>                    
                                    <div class="form-group">
                                        <label>Termin</label>
                                        <select class="js-example-basic-single" style="width:100%" name="termin" value="{{$product->termin}}">
                                            <option value="{{strtolower($product->termin)}}" selected>{{$product->termin}}</option>
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
                                        <input type="number" class="form-control" id="slotInput" name="slot" value="{{$product->slot}}"> 
                                        @if ($errors->has('slot'))
                                        <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('slot') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success mr-2" style="float: right;">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
</div>
@endsection
@section('custom_js')
<script src="{!! asset('template/backend/assets/js/shared/data-table.js') !!}"></script>

<script src="{{ asset('template/backend/assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>
@endsection