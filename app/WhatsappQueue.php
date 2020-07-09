<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappQueue extends Model
{
    protected $table = 'whatsappqueue';

    protected $fillable = [
        'whatsapp_id',
        'whatsapp_campaign_id',
        'phone_number'
    ];
}
