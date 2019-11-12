<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class Member extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = ["name", "username", "password", "nrb", "role", "sex", "dateofbirth", "group"];
}
