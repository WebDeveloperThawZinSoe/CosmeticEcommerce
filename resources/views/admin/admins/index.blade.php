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
        <button class="btn btn-primary btn-tone m-r-5" data-toggle="modal" data-target="#createModal"><i
                class="anticon anticon-plus"></i> Create</button>
        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $key=>$user)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><?php if($user->role == 1){ echo "Admin";}else{echo "Manager";} ?><td>
                        <td>
                            {{ $user->created_at->format('F j, Y, g:i a') }}
                        </td>
                        <td>
                            @if($user->id != 1)
                            <a href="{{ url('/admin/admins/' . $user->id . '/edit') }}" style="display:inline-block !important;" class="btn btn-warning">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <form style="display:inline-block !important;"
                                action="{{ url('/admin/admins/' . $user->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <input type="hidden" name="id" value="{{ $user->id }}">
                                <button type="submit" onclick="return confirm('Are You Sure To Delete This Account?')"
                                    class="btn btn-danger">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>

                            @endif
                          

                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
        <!-- User Create Modal -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">User Create</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('admin.admins.store')}}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="name">Name <span style="color:gold"> * </span></label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                        value="{{ old('name') }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="email">Email <span style="color:gold"> * </span></label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="role">Role <span style="color:gold"> * </span></label>
                                    <select class="form-control" id="role" name="role" 
                                         required>
                                         <option value="1">Admin</option>
                                         <option value="3">Manager</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="password">Password <span style="color:gold"> * </span></label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password" required>
                                </div>
                            </div>

                           


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


@endsection