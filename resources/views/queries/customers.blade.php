@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
              <a href="/home" class="list-group-item">Users</a>
              <a href="/salespeople" class="list-group-item">Salespeople</a>
              <a href="/customers" class="list-group-item active">Customers</a>
              <a href="/orders" class="list-group-item">Orders</a>
              <a href="/queries" class="list-group-item">Queries</a>
            </div>
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Customers</div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>City</th>
                                <th>Industry Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <th>{{$customer->id}}</th>
                                    <td>{{$customer->name}}</td>
                                    <td>{{$customer->city}}</td>
                                    <td>{{$customer->industryType}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $customers->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection