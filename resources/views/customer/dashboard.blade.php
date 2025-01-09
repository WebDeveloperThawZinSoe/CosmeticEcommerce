@extends('layouts.customer')

@section('body')
<div class="container">
@if(session('success'))
            <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('
                success ') }}',
                confirmButtonText: 'OK'
            });
            </script>
            @endif
        
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <br>
                    <h3>User Dashboard</h3>
                </div>
                <div class="card-body">
                    <p>Welcome back {{ Auth::user()->name }} </p>
                    <br>
                    Go Back To <a href="/">Website</a>  
                    <!-- Add dashboard content here -->
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-6 col-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$order_count}}</h2>
                            <p class="m-b-0 text-muted">Order</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-6 col-6">
            <div class="card">
                <div class="card-body">
                    <div class="media align-items-center">
                        <div class="avatar avatar-icon avatar-lg avatar-cyan">
                            <i class="anticon anticon-line-chart"></i>
                        </div>
                        <div class="m-l-15">
                            <h2 class="m-b-0">{{$cart_count}}</h2>
                            <p class="m-b-0 text-muted">Cart</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
      
        
    </div>
    <div class="row">
        <div class="col-md-12">
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
                                    <th>View</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($latest_order as $key=>$latest_order)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$latest_order->order_number}}</td>
                                        <td>{{$latest_order->total_price}} 
                                        @if($latest_order->country == "myanmar")
                            Ks
                            @elseif($latest_order->country == "korea")
                            ₩
                            @else
                            $
                            @endif
                                        </td>
                                        <td>
                                            <?php 
                                            if($latest_order->status == 1){
                                                echo "<p class='text-warning'>Pending</p>";
                                            }elseif($latest_order->status == 2){
                                                echo "<p class='text-success'>Confirmed</p>";
                                            }elseif($latest_order->status == 3){
                                                echo "<p class='text-danger'>Cancled</p>";
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <a href="/auth/order" class="btn btn-primary">View</a>
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
    <!-- Logout Button (Mobile View Only) -->
    <div class="row d-md-none mt-4">
        <div class="col-12">
            <a href="{{ route('logout') }}"
               class="btn btn-danger btn-block"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
@endsection
