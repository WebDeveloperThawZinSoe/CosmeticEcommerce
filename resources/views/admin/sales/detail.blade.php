@extends('layouts.admin')

@section('body')
<div class="card">
    <div class="card-body">
        <h3>Confirmed Sales Order Details for {{ \Carbon\Carbon::parse($date)->format('d - m - Y') }}</h3>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order No</th>
                        <th>Date</th>
                        <th>Total Price</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $index => $order)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ $order->created_at->format('d - m - Y H:i') }}</td>
                            <td>{{ $order->total_price }} Ks</td>
                            <td>
                                <a href="/admin/sales/order/{{$order->id}}" class="btn btn-info" >
                                <i class="anticon anticon-eye"></i>
                                    </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <a href="/admin/sales" class="btn btn-secondary mt-3">Back to Sales Report</a>
    </div>
</div>
@endsection
