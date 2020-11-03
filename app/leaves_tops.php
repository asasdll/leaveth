<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaves_tops extends Model
{
    protected $fillable = [
        'id_company','personalleave','personalleave_date','vacationleave','vacationleave_date'
    ];
    protected $hidden = [
        'remember_token'
    ];
}
