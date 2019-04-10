@extends('backend.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Announcement table</h4>
        <div class="row">
            <button class="btn btn-primary" data-toggle="modal" data-target="#createModal">Add Announcement</button>
            <div class="col-12">
                <table id="order-listing" class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Slug</th>
                            <th>Content</th>
                            <th>Created at</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($announcements as $announcement)
                        <tr>
                            <td class="row-title">{{$announcement->title}}</td>
                            <td class="row-category">{{optional($announcement->category)->name}}</td>
                            <td class="row-slug">{{$announcement->slug}}</td>
                            <td class="row-content">{{$announcement->content}}</td>
                            <td class="row-created_at">{{$announcement->created_at}}</td>
                            <td>
                                <button type="button" class="btn btn-warning btn-edit" data-toggle="modal" data-target="#editModal" style="padding: 0.5rem;" data-id="{{$announcement->id}}">Edit</button>
                                <button type="button" class="btn btn-danger btn-delete" data-toggle="modal" data-target="#deleteModal" style="padding: 0.5rem;" data-id="{{$announcement->id}}">Delete</button>
                            </td>
                        </tr>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<!-- create modal -->
<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('announcement.store') }}">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-control" name="category" id="category">
                            <option value="" selected disabled>Pilih Category</option>
                            @foreach($announcementCategory as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->first(''))
                        <small class="text-danger">{{ $errors->first('') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" value="{{ old('title') }}" require>
                        @if ($errors->first('title'))
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" cols="30" rows="5" class="form-control">{{ old('content') }}</textarea>
                        @if ($errors->first('content'))
                        <small class="text-danger">{{ $errors->first('content') }}</small>
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

<!-- delete modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Are you sure delete ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <form class="forms-sample" method="POST" action="{{ route('announcement.destroy') }}">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="hidden" name="id" id="id-delete">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger" id="btn-update">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- edit modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Announcement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="forms-sample" method="POST" action="{{ route('announcement.update') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id-edit">
                    <div class="form-group">
                        <label for="category-edit">Category</label>
                        <select class="form-control" name="category" id="category-edit">
                            <option value="" selected disabled>Pilih Category</option>
                            @foreach($announcementCategory as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->first(''))
                        <small class="text-danger">{{ $errors->first('') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="title-edit">Title</label>
                        <input type="text" class="form-control" id="title-edit" name="title" placeholder="title" value="{{ old('title') }}" require>
                        @if ($errors->first('title'))
                        <small class="text-danger">{{ $errors->first('title') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="content-edit">Content</label>
                        <textarea name="content" id="content-edit" cols="30" rows="5" class="form-control">{{ old('content') }}</textarea>
                        @if ($errors->first('content'))
                        <small class="text-danger">{{ $errors->first('content') }}</small>
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
@endsection
@section('custom_js')
<script src="{!! asset('template/backend/assets/js/shared/data-table.js') !!}"></script>
<script src="{{ asset('template/backend/assets/js/shared/file-upload.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/iCheck.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/typeahead.js') }}"></script>
<script src="{{ asset('template/backend/assets/js/shared/select2.js') }}"></script>

<script>
    $('.btn-edit').click(function(){
        let id = $(this).data('id')
        let title = $(this).closest('tr').find('.row-title').text();
        let category = $(this).closest('tr').find('.row-category').text();
        let content = $(this).closest('tr').find('.row-content').text();

        $('#id-edit').val(id)
        $('#title-edit').val(title)
        $('#content-edit').val(content)

        $("#category-edit option").filter(function() { 
            return $(this).text() == category; 
        }).prop('selected', true);
    })

    $('.btn-delete').click(function(){
        let id = $(this).data('id')
        $('#id-delete').val(id)
    })
</script>
@endsection
