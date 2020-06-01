<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappQueue extends Model
{
    protected $table = 'whatsappqueue';

    protected $fillable = [
        'phone_number'
    ];
}
