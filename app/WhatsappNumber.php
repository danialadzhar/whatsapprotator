<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappNumber extends Model
{
    protected $table = 'whatsappnumber';

    protected $fillable = [
        'whatsapp_id',
        'name',
        'phonenumber'
    ];
}
