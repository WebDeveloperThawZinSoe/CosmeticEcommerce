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
                        <label for="account_type">Accoutn Type <span style="color:gold"> * </span></label>
                        <select name="account_type" class="form-control" id="account_type">
                            @foreach($types as $type)
                            <option @if($user->customerType->type->id == $type->id) selected @endif
                                value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach

                        </select>

                    </div>
                    <div class="form-group col-md-6">
                        <label for="password">Password </label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                            >
                    </div>
                </div>
                <p>
                    This User Order Total Count :    {{ App\Models\Order::where('user_id', $user->id ?? '-')->where("status",2)->sum('total_price') }} $
                </p>
                <p>
                This User Order  Count : {{ App\Models\Order::where('user_id', $user->id ?? '-')->where("status",2)->count() }}
                </p>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>
</div>


@endsection