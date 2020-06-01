<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveNumber extends Model
{
    protected $table = 'activenumber';

    protected $fillable = [
        'phone_number'
    ];
}
