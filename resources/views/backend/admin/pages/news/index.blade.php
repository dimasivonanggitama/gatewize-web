@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">News table</h4>
        <div class="row">
            <a class="btn btn-primary" href="/admin/news/create">Add News</a>
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($news as $new)
                        <tr>
                            <td>{{$new->name}}</td>
                            <td>{{$new->slug}}</td>
                            <td>{{$new->title}}</td>
                            <td style="white-space: normal;">{{$new->content}}</td>
                            <td style="max-width: 150px;">
                                <img src="/storage/{{$new->image}}" style="width: 100%; height: auto; border-radius: 0;">
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-{{$new->id}}" style="padding: 0.5rem;">Edit</button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$new->id}}" style="padding: 0.5rem;">Delete</button>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteModal-{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$new->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-footer">
                                        <form class="forms-sample" method="POST" action="/admin/news/{{$new->id}}">
                                            @csrf
                                            {{method_field('DELETE')}}
                                            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger" id="btn-update">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="editModal-{{$new->id}}" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Are you user delete "{{$new->name}}" ?</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form class="forms-sample" method="POST" action="/admin/news/{{$new->id}}" enctype="multipart/form-data">
                                        <div class="modal-body">
                                          @csrf
                                          {{method_field('PUT')}}
                                          <div class="form-group">
                                            <label for="nameInput">Name</label>
                                            <input type="text" class="form-control" id="nameInput" placeholder="Name" name="name" value="{{$new->name}}"> 
                                            @if ($errors->has('name'))
                                            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('name') }}</label>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="codeInput">Slug</label>
                                            <input type="text" class="form-control" id="codeInput" placeholder="Slug" name="slug" value="{{$new->slug}}"> 
                                            @if ($errors->has('slyg'))
                                            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('slug') }}</label>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="nameInput">Title</label>
                                            <input type="text" class="form-control" id="nameInput" placeholder="Title" name="title" value="{{$new->title}}"> 
                                            @if ($errors->has('title'))
                                            <label id="firstname-error" class="error mt-2 text-danger" for="firstname">{{ $errors->first('title') }}</label>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="descriptionInput">Content</label> 
                                            <textarea class="form-control" id="descriptionInput" rows="2" name="content">{{$new->content}}</textarea>
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
                                </div>
                                <div class="modal-footer">
                                    <a class="btn btn-light" data-miss="modal">Cancel</a>
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
<script src="{!! asset('theme/StarAdmin/js/shared/data-table.js') !!}"></script>

<script src="{{ asset('theme/StarAdmin/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('theme/StarAdmin/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('theme/StarAdmin/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('theme/StarAdmin/js/shared/select2.js') }}"></script>
@endsection