<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addmac extends Model
{
    protected $fillable = [
        'idname','addmac','name'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
