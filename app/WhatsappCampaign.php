<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappCampaign extends Model
{
    
    protected $table = 'whatsappcampaign';

    protected $fillable = [

        'whatsapp_campaign_id',
        'title',
        'description',
        'whatsapp_answer',
        'status'

    ];

}
