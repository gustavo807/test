<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salesperson extends Model
{
    protected $table = 'salesperson';
    public $fillable = ['name','age','salary'];
}
