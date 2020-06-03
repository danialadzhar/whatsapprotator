<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhatsappleadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whatsapplead', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('whatsapp_id');
            $table->string('whatsapp_campaign_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('whatsapplead');
    }
}
