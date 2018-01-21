@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
              <a href="/home" class="list-group-item">Users</a>
              <a href="/salespeople" class="list-group-item">Salespeople</a>
              <a href="/customers" class="list-group-item">Customers</a>
              <a href="/orders" class="list-group-item active">Orders</a>
              <a href="/queries" class="list-group-item">Queries</a>
            </div>
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Orders</div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Number</th>
                                <th>Order Date</th>
                                <th>Customer Id</th>
                                <th>Salesperson Id</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <th>{{$order->id}}</th>
                                    <td>{{$order->number}}</td>
                                    <td>{{$order->order_date}}</td>
                                    <td>{{$order->cust_id}}</td>
                                    <td>{{$order->salesperson_id}}</td>
                                    <td>{{$order->amount}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $orders->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection