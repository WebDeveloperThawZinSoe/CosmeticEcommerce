@extends('layouts.admin')
@section('body')

<div class="card">
    <div class="card-body">
        <div class="m-t-25" style="max-width: 100%">
            <form action="{{ url('/admin/customers/' . $user->id) }}" method="POST">
                @method('PUT')
                @csrf
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="name">Name <span style="color:gold"> * </span></label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                            value="{{$user->name}}" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="email">Email <span style="color:gold"> * </span></label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                            value="{{$user->email}}" required>
                    </div>
                    
                </div>
                <div class="form-row">
                        <div class="form-group col-md-6">
                                    <label for="role">Role <span style="color:gold"> * </span></label>
                                    <select class="form-control" id="role" name="role" 
                                         required>
                                         <option value="1">Admin</option>
                                         <option value="3">Manager</option>
                                     </select>
                                </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            >
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>


@endsection