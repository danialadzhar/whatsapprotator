<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappLead extends Model
{
    protected $table = 'whatsapplead';

    protected $fillable = [
        'lead_id',
        'name',
        'phone_number',
        'whatsapp_id'
    ];
}
