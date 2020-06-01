<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{

    /**
     * Show login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.login');
    }

    /**
     * Check user login here.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check(Request $request)
    {
        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $admin = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if(Auth::guard('admin')->attempt($admin)){
            return redirect('admin');
        }else{
            return redirect()->back()->with('error','Invalid Email Or Password');
        }
    }
}
