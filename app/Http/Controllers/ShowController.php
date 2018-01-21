<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Salesperson;
use App\Customer;
use App\Order;
use App\HighAchiever;


class ShowController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salespeople()
    {
    	return view('queries.salespeople',['salespeople'=>Salesperson::paginate(10)]);
    }

    public function customers()
    {
    	return view('queries.customers',['customers'=>Customer::paginate(10)]);
    }

    public function orders()
    {
    	return view('queries.orders',['orders'=>Order::paginate(10)]);
    }

    public function queries()
    {
    	 $query_a = DB::select("SELECT s.name FROM salesperson s WHERE s.id IN 
						(SELECT o.salesperson_id FROM orders o WHERE o.cust_id IN 
						(SELECT c.id FROM customer c WHERE c.name='Samsonic') )");

    	 $query_b = DB::select("SELECT s.name FROM salesperson s WHERE s.id IN 
						(SELECT o.salesperson_id FROM orders o WHERE o.cust_id IN 
						(SELECT c.id FROM customer c WHERE NOT c.name='Samsonic') )");

    	 $query_c = DB::select("SELECT s.name FROM salesperson s WHERE s.id IN
						(SELECT o.salesperson_id FROM orders o GROUP BY o.salesperson_id HAVING COUNT(o.salesperson_id)>=2)");

    	 $highAchiever = HighAchiever::all();

    	return view('queries.queries',['query_a'=>$query_a, 'query_b'=>$query_b, 'query_c'=>$query_c, 'highAchiever'=>$highAchiever]);
    }
}
