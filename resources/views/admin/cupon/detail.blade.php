@extends('layouts.admin')

@section('body')
<div class="container">

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h2 class="text-start text-primary mb-4">Coupon Code Details</h2>
            <div class="d-flex flex-column">
                <p class="mb-2">
                    <span class="fw-bold">Code:</span> {{$cupon->cupon_code}}
                </p>
                <p class="mb-2">
                    <span class="fw-bold">Name:</span> {{$cupon->name}}
                </p>
                <p class="mb-2">
                    <span class="fw-bold">Type / Amount:</span>
                    @if($cupon->type == 0)
                    Nothing
                    @elseif($cupon->type == 1)
                    Amount ( {{$cupon->amount}} Ks )
                    @elseif($cupon->type == 2)
                    Percentage ( {{$cupon->amount}} % )
                    @endif
                </p>
                <p class="mb-2">
                    <span class="fw-bold">Status:</span>
                    <span class="{{ $cupon->status == 1 ? 'text-success' : 'text-danger' }}">
                        {{ $cupon->status == 1 ? 'Active' : 'Inactive' }}
                    </span>
                </p>
                <p class="mb-2">
                    <span class="fw-bold">Limit:</span> {{$cupon->code_limit}}
                </p>
                
                <p class="mb-2">
                    <span class="fw-bold">Used:</span> 
                    @php 
                                $usedCount = App\Models\CuponUseLog::where("cupon_id",$cupon->id)->count();
                            @endphp
                            {{ $usedCount }} 
                </p>
                <p class="mb-2">
                    <span class="fw-bold">Description:</span>
                    {!! $cupon->description !!}
                </p>
                <p class="mb-2">
                    <span class="fw-bold">Start Date:</span> {{$cupon->start_date}}
                </p>
                <p class="mb-2">
                    <span class="fw-bold">End Date:</span> {{$cupon->end_date}}
                </p>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h3>Cupon Code Use Logs</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User Name</th>
                        <th>Order Info</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cupon_log as $key=>$cupon_log)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>
                                @if($cupon_log->user_id == 0)
                                Guest Account
                                @else
                                $user = App\Models\User::where('id',$cupon_log->user_id)->first();

                                {{$user->name}}
                                @endif
                              </td>
                            <td>
                                <a href="/admin/orders/{{$cupon_log->OrderInfo->id}}" target="_blank">
                                {{$cupon_log->OrderInfo->order_number}}
                                </a>
                            </td>
                            <td>{{$cupon_log->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection