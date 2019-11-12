<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    protected $fillable = ['reason', 'amount', 'status', 'duedate', 'account'];
}
