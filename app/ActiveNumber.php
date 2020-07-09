<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveNumber extends Model
{
    protected $table = 'activenumber';

    protected $fillable = [
        'whatsapp_id',
        'whatsapp_campaign_id',
        'phone_number'
    ];
}
