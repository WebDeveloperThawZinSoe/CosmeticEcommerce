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

        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                <i class="anticon anticon-dollar"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{ $todaySales }} Ks</h2>
                                <p class="m-b-0 text-muted">Today Sale Volume</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{ $weeklySales }} Ks</h2>
                                <p class="m-b-0 text-muted">Weekly Sale Volume</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{ $monthlySales }} Ks</h2>
                                <p class="m-b-0 text-muted">Monthly Sale Volume</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Date</th>
                        <th>Sale Count</th>
                        <th>Total Amount</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index=>$order)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{ \Carbon\Carbon::parse($order->date)->format('d - m - Y') }}</td>
                            <td>{{ $order->sale_count }}</td>
                            <td>{{ $order->total_amount }} Ks</td>
                            <td>
                            <a href="/admin/sales/{{$order->date}}" class="btn btn-info" >
                                <i class="anticon anticon-eye"></i>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
