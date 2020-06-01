<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin.login');
    }

     /**
     * Check user admin authentication.
     *
     * @return \Illuminate\Http\Response
     */
    public function checklogin(Request $request)
    {
        $this->validate($request,[

            'email' => 'required',
            'password' => 'required' 

        ]);

        $user_detail = array(

            'email' => $request->email,
            'password' => $request->password

        );

        if(Auth::guard('admin')->attempt($user_detail)){

            return redirect('admin');

        }else{
            
            return back()->with('error','Please try again.');

        }
    }

     /**
     * Logout admin from admin panel.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {

        Auth::guard('admin')->logout();
        return redirect('admin/login');

    }

}
