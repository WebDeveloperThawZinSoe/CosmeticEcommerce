@extends('layouts.customer')

@section('body')
<div class="card">
    <div class="card-body">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
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

        <h4 class="card-title">Profile Settings</h4>

        <!-- Change Password Form -->
        <div class="mt-4">
            <h5>Change Password</h5>
            <form action="{{ route('customer.profile.changePassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" id="current_password" name="current_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New Password</label>
                    <input type="password" id="new_password" name="new_password" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Confirm New Password</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Password</button>
            </form>
        </div>

        <!-- Change Email Form -->
        <div class="mt-4">
            <h5>Change Email</h5>
            <form action="{{ route('customer.profile.changeEmail') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="email">New Email Address</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ Auth::user()->email }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Change Email</button>
            </form>
        </div>

    </div>
</div>
@endsection
