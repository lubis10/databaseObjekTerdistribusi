<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable =
        [ 'username','password','created_at','update_at'
    ];
}
