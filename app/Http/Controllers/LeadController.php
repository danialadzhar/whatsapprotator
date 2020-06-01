<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WhatsappLead;
use App\ActiveNumber;
use App\WhatsappQueue;
use App\WhatsappNumber;

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
        $whatsapp = WhatsappLead::orderBy('id','Desc')->get();
        $whatsapp_list = WhatsappNumber::all();

        return view('admin.whatsapp.lead', compact('whatsapp','count','whatsapp_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $deletequeue = WhatsappQueue::all();
        $phonenumber = ActiveNumber::all();

        // List
        $list = WhatsappNumber::all();

        if($phonenumber->isEmpty()){
            foreach ($list as $whatsapp) {
                ActiveNumber::create(array(
                    'phonenumber' => $whatsapp->phonenumber
                ));
                foreach($deletequeue as $queue){
                    $queue->delete();
                }
            }

            sleep(5);
            return redirect('/');
        }else{
            return view('admin.marketing.whatsapp.landingpage');
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
