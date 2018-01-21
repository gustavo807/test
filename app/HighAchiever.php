<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HighAchiever extends Model
{
    protected $table = 'high_achiever';
    public $fillable = ['name','age'];
}
