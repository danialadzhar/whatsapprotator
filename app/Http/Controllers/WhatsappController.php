<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsappNumber;
use App\ActiveNumber;
use App\WhatsappLead;
use App\WhatsappQueue;

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
        $insert = new WhatsappNumber;
        $insert->whatsapp_id = 'W' . rand(10000,99999);
        $insert->name = $request->fullname;
        $insert->phonenumber = '60' . $request->phonenumber;
        $insert->save();

        $list = new WhatsappQueue;
        $list->phone_number = '60' . $request->phonenumber;
        $list->save();

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
        $addresses = array();
        $phonenumber = ActiveNumber::all();
        $list = WhatsappNumber::all();
        // Nama Customer
        $namacustomer = $request->name;

        /*
            Random Phone Number
        */
        foreach ($phonenumber as $value) {
            $addresses[] = $value->phonenumber;
        }
        
        $size = count($addresses);
        $randomIndex = rand(0, $size - 1);
        $randomphone = $addresses[$randomIndex];
        
        /*
            Add other phone to queue
        */
        $wasapqueue = new WhatsappQueue;
        $wasapqueue->phonenumber = $randomphone;
        $wasapqueue->save();
        
        /*
            Delete phone number from list
        */
        $list = ActiveNumber::where('phonenumber', $randomphone)->first();
        $list->delete();

        /*
            Save Lead
        */
        $getwhatsapp_id = WhatsappNumber::where('phonenumber', $list->phonenumber)->first();

        $lead = new WhatsappLead;

        $lead->lead_id = 'L' . rand(10000,99999);
        $lead->name = $request->name;
        $lead->phonenumber = '60' . $request->phonenumber;
        $lead->whatsapp_id = $getwhatsapp_id->whatsapp_id;
        
        $lead->save();
        
        return view('admin.marketing.whatsapp.whatsapp', compact('randomphone'));

    }
}
