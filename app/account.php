<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'name',
        'numnber',
        'balance',
        'member',
        'lastactivitydate'
    ];
}
