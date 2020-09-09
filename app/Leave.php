<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
        'idmember','affair','head','lea_fname','lea_lname','lea_niname','position','leave','since','date1','date2','da',
        'address','tel','status_chief','status_hr','status_text2'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
