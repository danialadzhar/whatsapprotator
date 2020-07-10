<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsappLead;
use App\ActiveNumber;
use App\WhatsappQueue;
use App\WhatsappNumber;
use App\WhatsappCampaign;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = 1;
        $campaign = WhatsappCampaign::orderBy('id','Desc')->get();

        return view('admin.whatsapp.lead', compact('campaign', 'count'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $whatsapp_campaign = WhatsappCampaign::where('whatsapp_campaign_id', $id)->first();
        $deletequeue = WhatsappQueue::where('whatsapp_campaign_id', $id)->get();
        $phonenumber = ActiveNumber::where('whatsapp_campaign_id', $id)->get();

        // List
        $queue = WhatsappQueue::where('whatsapp_campaign_id', $id)->get();

        if($phonenumber->isEmpty()){

            foreach ($queue as $whatsapp) {

                ActiveNumber::create(array(

                    'whatsapp_id' => $whatsapp->whatsapp_id,
                    'whatsapp_campaign_id' => $whatsapp->whatsapp_campaign_id,
                    'phonenumber' => $whatsapp->phonenumber,

                ));

                foreach($deletequeue as $queue){

                    $queue->delete();

                }

            }

            sleep(5);
            return view('admin.whatsapp.landingpage', compact('whatsapp_campaign'));

        }else{

            return view('admin.whatsapp.landingpage', compact('whatsapp_campaign'));

        }
        
        //return view('admin.marketing.whatsapp.landingpage');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $lead = WhatsappLead::where('lead_id', $id)->first();

        $lead->delete();

        return redirect()->back()->with('success', 'Phone Number Deleted!');
    }
}
