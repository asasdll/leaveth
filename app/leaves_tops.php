<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leaves_tops extends Model
{
    protected $fillable = [
        'id_company','sickleave','sickleave_date','personalleave','personalleave_date','vacationleave','vacationleave_date'
    ];
    protected $hidden = [
        'remember_token'
    ];
}
