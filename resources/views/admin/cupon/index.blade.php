@extends('layouts.admin')

@section('body')
<div class="card">
    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show">
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

        <button class="btn btn-primary btn-tone m-r-5" data-toggle="modal" data-target="#createModal">
            <i class="anticon anticon-plus"></i> Create
        </button>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Type / Amount</th>
                        <th>Status</th>
                        <th>Usage/Limit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cupons as $key => $cupon)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $cupon->cupon_code }}</td>
                        <td>{{ $cupon->name }}</td>
                        <td>
                            @if($cupon->type == 0)
                            Nothing
                            @elseif($cupon->type == 1)
                            Amount ( {{$cupon->amount}} Ks )
                            @elseif($cupon->type == 2)
                            Percentage (  {{$cupon->amount}} % )
                            @endif
                            </td>
                        <td>{{ $cupon->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            @php 
                                $usedCount = App\Models\CuponUseLog::where("cupon_id",$cupon->id)->count();
                            @endphp
                            {{ $usedCount }} / {{ $cupon->code_limit }}
                        </td>
                        <td>
                            <a href="{{ route('admin.cupon.show', $cupon->id) }}"
                                class="btn btn-primary btn-sm me-1">
                                <i class="anticon anticon-info"></i>
                            </a>
                            <a href="{{ route('admin.cupon.edit', $cupon->id) }}" class="btn btn-warning btn-sm">
                                <i class="anticon anticon-edit"></i>
                            </a>
                            <form action="{{ route('admin.cupon.destroy', $cupon->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Are you sure to delete this cupon?')" class="btn btn-sm btn-danger">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Create Cupon Modal -->
        <div class="modal fade" id="createModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Create Cupon</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <i class="anticon anticon-close"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('admin.cupon.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="cupon_code">Cupon Code <span style="color:gold">*</span></label>
                                <input type="text" class="form-control" id="cupon_code" name="cupon_code" placeholder="Enter cupon code" value="{{ old('cupon_code') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="name">Name <span style="color:gold">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="type">Type <span style="color:gold">*</span></label>
                                <select class="form-control" id="type" name="type">
                                    <option value="2" {{ old('type') == 1 ? 'selected' : '' }}>Percentage</option>
                                    <option value="1" {{ old('type') == 2 ? 'selected' : '' }}>Fixed Amount</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="amount">Amount <span style="color:gold">*</span></label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter discount amount" value="{{ old('amount') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="code_limit">Code Limit <span style="color:gold">*</span></label>
                                <input type="number" class="form-control" id="code_limit" name="code_limit" placeholder="Enter code limit" value="{{ old('code_limit') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" placeholder="Enter description">{{ old('description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="status">Status <span style="color:gold">*</span></label>
                                <select class="form-control" id="status" name="status">
                                   
                                    <option value="0" {{ old('status') == 0 ? 'selected' : '' }} >Inactive</option>
                                    <option value="1" {{ old('status') == 1 ? 'selected' : '' }} selected>Active</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="datetime-local" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="datetime-local" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
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
