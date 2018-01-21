<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public $fillable = ['number','order_date','amount','cust_id','salesperson_id'];
}
