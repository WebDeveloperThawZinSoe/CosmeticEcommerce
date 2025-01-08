@extends('layouts.customer')

@section('body')
<div class="card">
    <div style="padding-top:40px !important;padding-left:40px !important;padding-bottom:40px">
        <?php 
        $user_id = Auth::user()->id;    
        $customer_type = App\Models\CustomerType::where("user_id",$user_id)->first();
        $type = App\Models\Type::where("id",$customer_type->type_id)->first();
        $discount_name = $type->name;
        $discount_amount = $type->discount_amount;
        $orderAmount = App\Models\Order::where('user_id', Auth::id())->where('status', '2')->sum('total_price');
    ?>
        <h4>Current Account Level : <?php  echo $discount_name; ?> </h4>
        <h4>Discount : <?php  echo $discount_amount; ?> % </h4>
        <h4>Your Total Order is {{$orderAmount}} $</h4>
       
    </div>
</div>
<div class="card">
    <table style="padding-left:40px !important;" class="table">


        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Discount</th>
                <th>Limit Amount</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
            $types = App\Models\Type::orderBy("discount_amount","asc")->get();
            @endphp
            @foreach($types as $key=>$type)
            <tr>
                <td data-label="No">{{++$key}}  </td>
                <td data-label="Name">{{$type->name}} <img src="{{ asset($type->icon) }}" alt="{{ $type->name }}"
                        style="width:30px !important"></< /td>
                <td data-label="Discount">{{$type->discount_amount	}} %</td>
                <td data-label="Limit Amount">{{$type->amount_limit	}} $</td>
                <td>
                    @if($customer_type->type_id != $type->id)
                    @php
                    $user_id = Auth::id();
                    $VIPRequest = App\Models\VIPRequest::where('user_id', $user_id)
                    ->where('status', 0)
                    ->count();
                    @endphp

                    @if($VIPRequest >= 1)
                    <input type="button" class="btn btn-default" disabled value="Request">
                    @else
                    @php
                    $amount_limit = $type->amount_limit;
                    $orderAmount = App\Models\Order::where('user_id', Auth::id())
                    ->where('status', '2')
                    ->sum('total_price');
                    
                    @endphp
                    @if($orderAmount >= $amount_limit)
                    <form action="{{ route('customer.vip.request') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $type->id }}">
                        <input type="submit" class="btn btn-primary" value="Request">
                    </form>
                    @else 
                    @php 
                    $need = $amount_limit -  $orderAmount;
                    @endphp
                    <input type="submit" class="btn btn-default" title="To Unlock You Need By More {{$need}}  " disabled value="Request">

                    @endif

                    
                    @endif
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>



<div class="card">
    <br>
    <h3>VIP Request History</h3>
    <br>
    <table style="padding-left:40px !important;" class="table">


        <thead>
            <tr>
                <th>No</th>
                <th>Request Level</th>
                <th>Status</th>
                <th>Comment</th>
                <th>Request Date</th>
            </tr>
        </thead>
        <tbody>
            @php
            $user_id = Auth::id();
            $VIPRequest = App\Models\VIPRequest::where("user_id",$user_id)->orderBy("id","desc")->get();
            @endphp
            @foreach($VIPRequest as $key=>$VIPRequest)
            <tr>
                <td data-label="No">{{++$key}}</td>
                <td>{{$VIPRequest->type->name}}</td>
                <td>@if($VIPRequest->status == 0)
                    <p class="badge badge-warning">Pending</p>

                    @elseif($VIPRequest->status == 1)
                    <p class="badge badge-success">Confirm</p>

                    @elseif($VIPRequest->status == 2)
                    <p class="badge badge-danger">Canceled</p>

                    @endif
                </td>
                <td>{{$VIPRequest->comment ?? '-'}}</td>
                <td>
                    {{ $VIPRequest->created_at->format('F j, Y, g:i a') }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection