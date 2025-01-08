@extends('layouts.admin')

@section('body')
<div class="card">
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show">
            <strong>Success!</strong>  {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Error!</strong> Please check the form below for errors.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <button class="btn btn-primary btn-tone m-r-5" data-toggle="modal" data-target="#createModal">
            <i class="anticon anticon-plus"></i> Create
        </button>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Icon</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if($category->icon)
                                <img src="{{ asset('images/product_categories/' . $category->icon) }}" width="50" alt="{{ $category->name }}">
                            @endif
                        </td>
                        <td>
                            {{ $category->created_at->format('F j, Y, g:i a') }}
                        </td>
                        <td>
                            <a href="{{ route('admin.product_categories.edit', $category->id) }}" class="btn btn-warning">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <form action="{{ route('admin.product_categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are You Sure To Delete This Category?')" class="btn btn-danger">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Product Category Modal -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Product Category</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.product_categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span style="color:gold"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Description">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="file" class="form-control" id="icon" name="icon">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
