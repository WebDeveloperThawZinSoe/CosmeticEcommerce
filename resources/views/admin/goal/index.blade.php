@extends('layouts.admin')

@section('body')
@php
$categories = App\Models\ProductCategory::get();
@endphp
<div class="card">
    <div class="card-body">
        @if (session('success'))
        <div class="alert alert-primary alert-dismissible fade show">
            <strong>Success!</strong> {{ session('success') }}
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
                        <th>Goal</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $groupedGoals = $goals->groupBy('name');
                    @endphp

                    @foreach($groupedGoals as $index => $group)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $index }}</td> <!-- Name of the goal -->
                        <td>
                            {{ $group->pluck('category.name')->unique()->join(', ') }}
                        </td>
                        <td>
                            <button data-toggle="modal" data-target="#editModal_{{$loop->iteration}}" data-name="{{ $index }}"
                                data-categories="{{ json_encode($group->pluck('product_category_id')->toArray()) }}"
                                class="btn btn-warning edit-btn">
                                <i class="anticon anticon-edit"></i>
                            </button>

                            <form action="{{ route('admin.goal.destroy', $group->first()->name) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are You Sure To Delete This Goal?')"
                                    class="btn btn-danger">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal_{{$loop->iteration}}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Goal</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="anticon anticon-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="/admin/goal/updateData" method="POST" id="editForm">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="name" value="{{$index}}">
                                        <div class="form-group">
                                            <label for="editCategory">Category <span style="color:gold"> *
                                                </span></label>
                                            <select name="category[]" id="editCategory" class="form-control" multiple
                                                required>
                                                @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Goal</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.goal.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name <span style="color:gold"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category <span style="color:gold"> * </span></label>

                                <select name="category[]" class="form-control" multiple required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
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