@extends('backend.master')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="text-center">Order List</h1>
        </div>
        <div class="card-body">
           

            <div id="orderReport">
               
                <br>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Serial</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(isset($orders))
                            @foreach($orders as $key => $order)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $order->product->name }}</td>
                                    <td>{{ $order->price }} Tk.</td>
                                    <td>{{ $order->full_name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td class="text-danger">{{ $order->status }}</td>
                                    <td><a href="{{ route('confirm',$order->id) }}" class="btn btn-warning">Confirm</a>
                                        <a href="{{ route('order.cancel',$order->id) }}" class="btn btn-danger">Cancel</a>
                                    
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</div>



@endsection
