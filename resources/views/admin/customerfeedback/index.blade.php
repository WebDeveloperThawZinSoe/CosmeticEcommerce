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

        <h4 class="card-title">Orders List</h4>

        <div class="m-t-25">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Feedback</th>
                        <th>Image</th>
                        <th>Date</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key=>$data)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->about}}</td>
                            <td><a href="{{asset('images/feedback/')}}/{{$data->image}}" target="_blank" ><img style="width:100px;height:100px" src="{{asset('images/feedback/')}}/{{$data->image}}" alt="Image"></a></td>
                            <td>{{$data->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
