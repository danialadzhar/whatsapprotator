<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsappCampaign;
use App\WhatsappNumber;
use App\WhatsappQueue;

class CampaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   

        $whatsapp_number = WhatsappNumber::all();

        return view('admin.whatsapp.campaign', compact('whatsapp_number'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whatsapp_campaign_id = uniqid();

        foreach ($request->whatsapp_id as $key => $value) {
            
            $whatsapp_number = WhatsappNumber::where('whatsapp_id', $value)->get();

            foreach ($whatsapp_number as $whatsapp) {
                
                WhatsappQueue::create(array(

                    'whatsapp_id' => $value,
                    'whatsapp_campaign_id' => $whatsapp_campaign_id,
                    'phonenumber' => $whatsapp->phonenumber
    
                ));

            }

        }

        sleep(2);
        
        $insert = new WhatsappCampaign;
        
        $insert->whatsapp_campaign_id = $whatsapp_campaign_id;
        $insert->title = $request->title;
        $insert->description = $request->description;
        $insert->whatsapp_answer = $request->answer;
        $insert->status = 'Active';

        $insert->save();

        return redirect()->back()->with('success', 'Campaign Created!');

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
        //
    }
}
