<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = ['reason', 'amount', 'status', 'duedate', 'account'];    
}
