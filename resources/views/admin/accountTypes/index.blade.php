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

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="m-t-25">
                    <table id="data-table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Icon</th>
                                <th>Discount</th>
                                <th>Limit</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $index => $type)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $type->name }}</td>
                                <td><img src="{{ asset($type->icon) }}" alt="{{ $type->name }}" width="50"></td>
                                <td>{{ $type->discount_amount }}</td>
                                <td>{{ $type->amount_limit ?? "0" }}</td>
                                <td>
                                    <a href="{{ route('admin.account_types.edit', $type->id) }}"
                                        class="btn btn-sm btn-warning"> <i class="anticon anticon-edit"></i></a>
                                    <form action="{{ route('admin.account_types.destroy', $type->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="anticon anticon-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="m-t-25" style="max-width: 100%">
                    <form action="{{ route('admin.account_types.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="name">Name <span style="color:gold"> * </span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name"
                                    required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="discount_amount">Discount Amount <span style="color:gold"> * </span></label>
                                <input type="number" class="form-control" id="discount_amount" name="discount_amount"
                                    placeholder="Discount Amount" required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="limit">Amount Limit <span style="color:gold"> * </span></label>
                                <input type="text" class="form-control" id="limit" name="limit" placeholder="1000"
                                    required>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="icon">Icon <span style="color:gold"> * </span></label>
                                <input type="file" class="form-control" id="icon" name="icon" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <br>
        <h3>Member Request History</h3>
        <br>
        <div class="card">
            <div class="card-body">
                <table style="padding-left:40px !important;" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Request Level</th>
                            <th>Status</th>
                            <th>Comment</th>
                            <th>Request Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $user_id = Auth::id();
                        $VIPRequest = App\Models\VIPRequest::orderBy("id","desc")->get();
                        @endphp
                        @foreach($VIPRequest as $key=>$VIPRequest)
                        <tr>
                            <td data-label="No">{{ ++$key }}</td>
                            <td>
                                <button type="button" class="btn btn-default" data-toggle="modal"
                                    data-target="#customerDetailModal-{{ $VIPRequest->user->id  ?? '-' }}">
                                    {{ $VIPRequest->user->name  ?? '-' }}
                                </button>

                                <!-- Customer Detail Modal -->
                                <div class="modal fade" id="customerDetailModal-{{ $VIPRequest->user->id ?? '-' }}"
                                    tabindex="-1" role="dialog" aria-labelledby="customerDetailModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="customerDetailModalLabel">Customer Details:
                                                    {{ $VIPRequest->user->name ?? '-' }}</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Email: {{ $VIPRequest->user->email ?? '-' }}</h6>
                                                <h6>Account Type: {{ $VIPRequest->user->customerType->type->name ?? '-' }}</h6>
                                                <h6>Orders Count:
                                                    {{ App\Models\Order::where('user_id', $VIPRequest->user->id ?? '-')->where("status",2)->count() }}
                                                </h6>
                                                <h6>Orders Amount:
                                                    {{ App\Models\Order::where('user_id', $VIPRequest->user->id ?? '-')->where("status",2)->sum('total_price') }} $
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $VIPRequest->type->name }}</td>
                            <td>
                                @if($VIPRequest->status == 0)
                                <p class="badge badge-warning">Pending</p>
                                @elseif($VIPRequest->status == 1)
                                <p class="badge badge-success">Confirmed</p>
                                @elseif($VIPRequest->status == 2)
                                <p class="badge badge-danger">Canceled</p>
                                @endif
                            </td>
                            <td>{{ $VIPRequest->comment ?? '-' }}</td>
                            <td>{{ $VIPRequest->created_at->format('F j, Y, g:i a') }}</td>
                            <td>
                                <!-- Edit Button to trigger modal -->
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#editModal-{{ $VIPRequest->id }}">Edit</button>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal-{{ $VIPRequest->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('admin.vip.request.update', $VIPRequest->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel">Edit VIP Request:
                                                        {{ $VIPRequest->user->name  ?? '-' }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="status">Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="0"
                                                                {{ $VIPRequest->status == 0 ? 'selected' : '' }}>Pending
                                                            </option>
                                                            <option value="1"
                                                                {{ $VIPRequest->status == 1 ? 'selected' : '' }}>Confirm
                                                            </option>
                                                            <option value="2"
                                                                {{ $VIPRequest->status == 2 ? 'selected' : '' }}>Cancel
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="comment">Comment</label>
                                                        <textarea name="comment" id="comment"
                                                            class="form-control">{{ $VIPRequest->comment }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection