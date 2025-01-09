@extends('layouts.admin')

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(Auth::user()->role == 1)
                <div class="card-header">
                    <br>
                    <h3>Admin Dashboard</h3>
                </div>
                <div class="card-body">
                    <p>Welcome back {{Auth::user()->name}} </p>
                    <p>Domain , Hosting , Technical Support Expire : <span class="badge badge-danger"> 18 November 2026 </span></p>
                    <p>Developer Information : <a target="_blank" href="telto:09403077739">+959403077739</a> , <a target="_blank" href="mailto:thawzinsoe.dev@gmail.com">thawzinsoe.dev@gmail.com</a> , <a target="_blank" href="https://thawzinsoe.com">https://thawzinsoe.com</a> </p>
                    <!-- Add dashboard content here -->
                </div>
                @elseif(Auth::user()->role == 3)
                <div class="card-header">
                    <br>
                    <h1>Welcome back {{Auth::user()->name}} </h1>
                    <br>
                </div>
                @endif
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-lg-6">
            <a href="/admin/sales">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-blue">
                                <i class="anticon anticon-dollar"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 style="display:inline !important;" class="m-b-0">{{$totalPriceMM}} Ks</h2> |
                                <h2 style="display:inline !important;" class="m-b-0">{{$totalPriceSK}} ₩</h2>
                                <p class="m-b-0 text-muted">Total Sale</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-6">
            <a href="/admin/orders">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-cyan">
                                <i class="anticon anticon-line-chart"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$order}}</h2>
                                <p class="m-b-0 text-muted">Total Order</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-6">
            <a href="/admin/products">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-gold">
                                <i class="anticon anticon-profile"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$product}}</h2>
                                <p class="m-b-0 text-muted">Total Products</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-6 col-lg-6">
            <a href="/admin/customers">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="avatar avatar-icon avatar-lg avatar-purple">
                                <i class="anticon anticon-user"></i>
                            </div>
                            <div class="m-l-15">
                                <h2 class="m-b-0">{{$customer}}</h2>
                                <p class="m-b-0 text-muted">Total Customers</p>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    
    <div class="row">
        <!-- <div class="col-md-6">
            <div class="card " style="padding-top:30px !important;">
                <div class="card-header">
                    <h3>Orders by Amount and Date</h3>
                </div>
                <div class="card-body">
                    <canvas id="orderChart" width="100%" height="400px"></canvas>
                </div>
            </div>
        </div> -->
        <div class="col-md-12">
            <div class="card " style="padding-top:30px !important;"> 
                <div class="card-header">
                    <h3>User Account Volume by Date</h3>
                </div>
                <div class="card-body">
                    <canvas id="userChart" width="100%" height="400px"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h1>Latest Order</h1>
                    <div class="m-t-25">
                        <table id="data-table2" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Order No</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order_datas as $key=>$order_data)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{$order_data->order_number}}</td>
                                        <td>{{$order_data->total_price}} 
                                        @if($order_data->country ==
                                        "myanmar")
                                        Ks
                                        @elseif($order_data->country == "korea")
                                        ₩
                                        @else
                                        $
                                        @endif
                                        </td>
                                        <td>
                                            @if($order_data->status == 1)
                                            <span class="badge badge-warning">Pending</span>  
                                            @elseif($order_data->status == 2)
                                            <span class="badge badge-success">Confirm</span>   
                                            @elseif($order_data->status == 3)
                                            <span class="badge badge-danger">Cancel</span>   
                                            @elseif($order_data->status == 4)
                                            <span class="badge badge-warning">Payment Pending</span>  
                                            @endif
                                        </td>
                                        <td><a class="btn btn-primary" href="/admin/orders">View </a></td>
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
                    <h1>Latest Product</h1>
                    <div class="m-t-25">
                        <table id="data-table2" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key=>$product)
                                <tr>
                                    <td>{{++$key}}</td>
                                    <td>{{$product->name}}</td>
                                    <td>@if($product->image)
                                        <img src="{{ asset($product->image) }}" width="50" alt="{{ $product->name }}">
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-primary" href="/admin/products">View</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Order chart data
    var orderDates = @json($dates);
    var orderAmounts = @json($amounts);

    // User volume chart data
    var userDates = @json($userDates);
    var userVolumes = @json($userVolumes);

    // Setup the Order Chart
    var orderCtx = document.getElementById('orderChart').getContext('2d');
    var orderChart = new Chart(orderCtx, {
        type: 'bar', 
        data: {
            labels: orderDates, 
            datasets: [{
                label: 'Total Sales by Date', 
                data: orderAmounts, 
                backgroundColor: 'rgba(54, 162, 235, 0.2)', 
                borderColor: 'rgba(54, 162, 235, 1)', 
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Make sure it resizes
            scales: {
                y: {
                    beginAtZero: true 
                }
            }
        }
    });

    // Setup the User Volume Chart
    var userCtx = document.getElementById('userChart').getContext('2d');
    var userChart = new Chart(userCtx, {
        type: 'line', 
        data: {
            labels: userDates, 
            datasets: [{
                label: 'New Users by Date', 
                data: userVolumes, 
                fill: false, 
                borderColor: 'rgba(75, 192, 192, 1)', 
                tension: 0.1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,  // Make sure it resizes
            scales: {
                y: {
                    beginAtZero: true 
                }
            }
        }
    });
</script>
<script>
    $('#data-table2').DataTable();
</script>
@endsection



