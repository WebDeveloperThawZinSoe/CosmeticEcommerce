@extends('layouts.admin')
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

        <button class="btn btn-primary btn-tone m-r-5" data-toggle="modal" data-target="#createModal">
            <i class="anticon anticon-plus"></i> Create
        </button>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Method Name</th>
                        <th>Icon</th>
                        <th>Account No</th>
                        <th>Account Name</th>
                        <th>Country</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($paymentMethods as $key => $paymentMethod)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $paymentMethod->method_name }}</td>
                        <td>
                            <img src="{{ asset('images/payment_method/' . $paymentMethod->icon) }}"
                                style="width:120px;height:120px" alt="Icon">
                        </td>
                        <td>{{ $paymentMethod->account_no }}</td>
                        <td>{{ $paymentMethod->account_name }}</td>
                        <td>
                            {{ $paymentMethod->country }}
                        </td>
                        <td>
                            <button class="btn btn-warning" data-toggle="modal"
                                data-target="#editModal{{ $paymentMethod->id }}">
                                <i class="anticon anticon-edit"></i>
                            </button>
                            <form style="display:inline-block"
                                action="{{ route('admin.payment_method.destroy', $paymentMethod->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    onclick="return confirm('Are you sure to delete this Payment Method?')"
                                    class="btn btn-danger">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                    <!-- Edit Modal -->
                    <div class="modal fade" id="editModal{{ $paymentMethod->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Payment Method</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <i class="anticon anticon-close"></i>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('admin.payment_method.update', $paymentMethod->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="method_name">Method Name</label>
                                            <input type="text" class="form-control" name="method_name"
                                                value="{{ $paymentMethod->method_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="account_no">Account No</label>
                                            <input type="text" class="form-control" name="account_no"
                                                value="{{ $paymentMethod->account_no }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="account_name">Account Name</label>
                                            <input type="text" class="form-control" name="account_name"
                                                value="{{ $paymentMethod->account_name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <select name="country" class="form-control" id="">
                                                <option value="myanmar">Myanmar</option>
                                                <option value="korea">Korea</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="icon">Icon (Leave empty if no change)</label>
                                            <input type="file" class="form-control" name="icon">
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
                        <h5 class="modal-title">Create Payment Method</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.payment_method.store') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="method_name">Method Name</label>
                                <input type="text" class="form-control" name="method_name"
                                    value="{{ old('method_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="account_no">Account No</label>
                                <input type="text" class="form-control" name="account_no"
                                    value="{{ old('account_no') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="account_name">Account Name</label>
                                <input type="text" class="form-control" name="account_name"
                                    value="{{ old('account_name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="icon">Icon</label>
                                <input type="file" class="form-control" name="icon" required>
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" class="form-control" id="">
                                    <option value="myanmar">Myanmar</option>
                                    <option value="korea">Korea</option>
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