@extends('layouts.admin')

@section('body')
<div class="container">
    <h1>Edit Order Status</h1>

    <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="status">Order Status</label>
            <select class="form-control" id="status" name="status">
                <option value="1" {{ $order->status == 1 ? 'selected' : '' }}>Pending</option>
                <option value="2" {{ $order->status == 2 ? 'selected' : '' }}>Confirmed</option>
                <option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
</div>
@endsection
