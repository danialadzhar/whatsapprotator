<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappCampaign extends Model
{
    
    protected $table = 'whatsapp_campaign';

    protected $fillable = [

        'whatsapp_campaign_id',
        'title',
        'description',
        'program',
        'whatsapp_answer',
        'status'

    ];

}
