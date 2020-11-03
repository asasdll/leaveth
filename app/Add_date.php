<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Add_date extends Model
{
    protected $fillable = [
        'id_user','data_name','date_up'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $table = 'add_date';
}

