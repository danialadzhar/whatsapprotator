<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappLead extends Model
{
    protected $table = 'whatsapplead';

    protected $fillable = [
        'lead_id',
        'name',
        'phonenumber',
        'whatsapp_id',
        'whatsapp_campaign_id'
    ];
}
