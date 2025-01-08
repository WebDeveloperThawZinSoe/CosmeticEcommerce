@extends('layouts.admin')

@section('body')
<div class="row">
    <div class="col-md-12">
        @if (session('status'))
        <div class="alert alert-primary alert-dismissible fade show">
            <strong>Success!</strong> {{ session('status') }}
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
    </div>

    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="m-t-25" style="max-width: 100%">
                    <form action="{{ route('admin.account_types.update', $account_type->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span style="color:gold"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $account_type->name }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="discount_amount">Discount Amount <span style="color:gold"> * </span></label>
                                <input type="number" class="form-control" id="discount_amount" name="discount_amount" value="{{ $account_type->discount_amount }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="limit">Limit <span style="color:gold"> * </span></label>
                                <input type="text" class="form-control" id="limit" name="limit" value="{{ $account_type->amount_limit }}" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="icon">Icon</label>
                                <input type="file" class="form-control" id="icon" name="icon">
                                <small>Leave blank if you don't want to change the icon</small>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Current Icon</label><br>
                                <img src="{{ asset($account_type->icon) }}" alt="{{ $account_type->name }}" width="50">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning">Update</button>
                        <a href="{{ route('admin.account_types.index') }}" class="btn btn-primary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
