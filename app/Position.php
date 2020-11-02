<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = [
        'id_com','idchief','code_division','division'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
