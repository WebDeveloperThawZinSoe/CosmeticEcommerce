@extends('layouts.admin')

@section('body')
<style>
.product-card { height: 100%; display: flex; flex-direction: column; justify-content: space-between; }
.product-card .card-img-top { width: 150px; height: 150px; object-fit: contain; margin: 0 auto; }
.product-card .card-body { flex: 1; display: flex; flex-direction: column; justify-content: space-between; text-align: center; }
</style>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h3>Create Order By Admin</h3>
            <form id="orderForm" action="{{ route('admin.orders.cart.user') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="userSelect">Select User</label>
                    <select id="userSelect" class="form-control" name="user_id" required>
                        <option value="" selected disabled>Choose a User</option>
                        <option value="2" {{ isset($userId) && $userId == 2 ? 'selected' : '' }}>Guest User</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ isset($userId) && $userId == $user->id ? 'selected' : '' }}>{{ $user->name }} - {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Select</button>
            </form>
        </div>
    </div>
</div>
@endsection
