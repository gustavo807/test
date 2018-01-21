@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
              <a href="/home" class="list-group-item">Users</a>
              <a href="/salespeople" class="list-group-item active">Salespeople</a>
              <a href="/customers" class="list-group-item">Customers</a>
              <a href="/orders" class="list-group-item">Orders</a>
              <a href="/queries" class="list-group-item">Queries</a>
            </div>
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Salespeople</div>

                <div class="panel-body">

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Age</th>
                                <th>Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salespeople as $salesperson)
                                <tr>
                                    <th>{{$salesperson->id}}</th>
                                    <td>{{$salesperson->name}}</td>
                                    <td>{{$salesperson->age}}</td>
                                    <td>{{$salesperson->salary}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $salespeople->links() }}
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection