@extends('layouts.admin')

@section('body')
<div class="card">
    <div class="card-body">
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

        <h4 class="mb-4">Edit Cupon Code</h4>
        <form action="{{ route('admin.cupon.update', $cupon->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="cupon_code">Coupon Code <span style="color:gold"> * </span></label>
                <input type="text" class="form-control" id="cupon_code" name="cupon_code" value="{{ old('cupon_code', $cupon->cupon_code) }}" required>
            </div>

            <div class="form-group">
                <label for="name">Name <span style="color:gold"> * </span></label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $cupon->name) }}" required>
            </div>

            <div class="form-group">
                <label for="type">Type <span style="color:gold"> * </span></label>
                <select class="form-control" id="type" name="type" required>
                    <option value="1" {{ old('type', $cupon->type) == 1 ? 'selected' : '' }}>Fixed Amount</option>
                    <option value="2" {{ old('type', $cupon->type) == 2 ? 'selected' : '' }}>Percentage</option>
                </select>
            </div>

            <div class="form-group">
                <label for="amount">Amount <span style="color:gold"> * </span></label>
                <input type="number" class="form-control" id="amount" name="amount" value="{{ old('amount', $cupon->amount) }}" required>
            </div>

            <div class="form-group">
                <label for="code_limit">Code Limit <span style="color:gold"> * </span></label>
                <input type="number" class="form-control" id="code_limit" name="code_limit" value="{{ old('code_limit', $cupon->code_limit) }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ old('description', $cupon->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status <span style="color:gold"> * </span></label>
                <select class="form-control" id="status" name="status" required>
                    <option value="1" {{ old('status', $cupon->status) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('status', $cupon->status) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Start Date</label>
                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date', $cupon->start_date ? date('Y-m-d\TH:i', strtotime($cupon->start_date)) : '') }}">
            </div>

            <div class="form-group">
                <label for="end_date">End Date</label>
                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date', $cupon->end_date ? date('Y-m-d\TH:i', strtotime($cupon->end_date)) : '') }}">
            </div>

            <div class="modal-footer">
                <a href="{{ route('admin.cupon.index') }}" class="btn btn-default">Cancel</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
