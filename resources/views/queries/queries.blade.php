@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
              <a href="/home" class="list-group-item">Users</a>
              <a href="/salespeople" class="list-group-item">Salespeople</a>
              <a href="/customers" class="list-group-item">Customers</a>
              <a href="/orders" class="list-group-item">Orders</a>
              <a href="/queries" class="list-group-item active">Queries</a>
            </div>
        </div>

        <div class="col-md-10 ">
            <div class="panel panel-default">
                <div class="panel-heading">Queries</div>

                <div class="panel-body">

                    <h4>a. The names of all salespeople that have an order with Samsonic.</h4>

                    <p>
                        SELECT s.name FROM salesperson s WHERE s.id IN 
                        (SELECT o.salesperson_id FROM orders o WHERE o.cust_id IN 
                        (SELECT c.id FROM customer c WHERE c.name='Samsonic') );
                    </p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($query_a as $a)
                                <tr>
                                    <td>{{$a->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <h4>b. The names of all salespeople that do not have any order with Samsonic.</h4>

                    <p>
                        SELECT s.name FROM salesperson s WHERE s.id IN 
                        (SELECT o.salesperson_id FROM orders o WHERE o.cust_id IN 
                        (SELECT c.id FROM customer c WHERE NOT c.name='Samsonic') );
                    </p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($query_b as $b)
                                <tr>
                                    <td>{{$b->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <h4>c. The names of salespeople that have 2 or more orders.</h4>

                    <p>
                        SELECT s.name FROM salesperson s WHERE s.id IN
                        (SELECT o.salesperson_id FROM orders o GROUP BY o.salesperson_id HAVING COUNT(o.salesperson_id)>=2);
                    </p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($query_c as $c)
                                <tr>
                                    <td>{{$c->name}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>

                    <h4>d. Write a SQL statement to insert rows into a table called highAchiever (Name, Age), where a salesperson must have a salary of 100,000 or greater to be included in the table.</h4>

                    <p>
                        INSERT INTO high_achiever(name,age)
                        (SELECT s.name,s.age FROM salesperson s WHERE s.salary >= 100000);
                    </p>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($highAchiever as $c)
                                <tr>
                                    <td>{{$c->name}}</td>
                                    <td>{{$c->age}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>


                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection