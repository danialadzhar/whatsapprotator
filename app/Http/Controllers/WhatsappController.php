<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsappNumber;
use App\ActiveNumber;
use App\WhatsappLead;
use App\WhatsappQueue;
use App\WhatsappCampaign;

class WhatsappController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $whatsapp = WhatsappNumber::orderBy('id','Desc')->get();

        return view('admin.whatsapp.list', compact('whatsapp','count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whatsapp_id = 'W' . uniqid();

        $insert = new WhatsappNumber;
        $insert->whatsapp_id = $whatsapp_id;
        $insert->name = $request->fullname;
        $insert->phonenumber = '6' . $request->phonenumber;
        $insert->save();

        return redirect()->back()->with('success', 'New Whatsapp Number Added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $whatsapp = WhatsappNumber::where('whatsapp_id', $id)->first();

        $whatsapp->delete();

        return redirect()->back()->with('success', 'Phone Number Deleted!');
    }

    /**
     * Code that run the rotator.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function whatsapprotate(Request $request){
        
        // Array
        $whatsapp_id = array();
        $whatsapp_campaign_id = array();
        $phonenumber = array();

        $activenumber = ActiveNumber::where('whatsapp_campaign_id', $whatsapp_campaign)->get();

        /*
            Random Phone Number
        */
        foreach ($activenumber as $number) {

            $whatsapp_id[] = $number->whatsapp_id;
            $whatsapp_campaign_id[] = $number->whatsapp_campaign_id;
            $phonenumber[] = $number->phonenumber;

        }
        
        // Size
        $whatsapp_id_size = count($whatsapp_id);
        $whatsapp_campaign_id_size = count($whatsapp_campaign_id);
        $phonenumber_size = count($phonenumber);

        // Random
        $whatsapp_id_random = rand(0, $whatsapp_id_size - 1);
        $whatsapp_campaign_id_random = rand(0, $whatsapp_campaign_id_size - 1);
        $phonenumber_random = rand(0, $phonenumber_size - 1);

        // Random Phone Number
        $whatsapp_phone_number = $phonenumber[$phonenumber_random];
        
        /*
            Add other phone to queue
        */
        $whatsapp_queue = new WhatsappQueue;

        $whatsapp_queue->whatsapp_id = $whatsapp_id[$whatsapp_id_random];
        $whatsapp_queue->whatsapp_campaign_id = $whatsapp_campaign_id[$whatsapp_campaign_id_random];
        $whatsapp_queue->phonenumber = $phonenumber[$phonenumber_random];

        $whatsapp_queue->save();
        
        /*
            Delete phone number from Active Number
        */
        $get_active_number = ActiveNumber::where('phonenumber', $whatsapp_phone_number)->first();

        /*
            Save Lead
        */
        $getwhatsapp_id = WhatsappNumber::where('phonenumber', $get_active_number->phonenumber)->first();

        
        $lead = new WhatsappLead;

        $lead->lead_id = 'L' . rand(10000,99999);
        $lead->name = $request->name;
        $lead->phonenumber = '60' . $request->phonenumber;
        $lead->whatsapp_id = $getwhatsapp_id->whatsapp_id;
        $lead->whatsapp_campaign_id = $request->whatsapp_campaign;        
        $lead->save();
        
        $whatsapp_campaign = WhatsappCampaign::where('whatsapp_campaign_id', $request->whatsapp_campaign)->first();

        $get_active_number->delete();
        
        return view('admin.whatsapp.whatsapp', compact('whatsapp_phone_number','whatsapp_campaign'));

    }
}
