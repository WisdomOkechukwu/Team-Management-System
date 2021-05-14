<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('Auth.login');
    }

    public function verify(Request $request)
    {
        
        $this->validate($request,[
            'email' =>'required|email',
            'password'=>'required',
         ]);

         if(!Auth::attempt($request->only('email','password'))){
            return back()->with('Login_Status','Invalid Login Details');
         }
         
         if(auth()->user()->status == "Admin")

         
         {
            return view('Admin.admin');
         }

        //  ;
    }
}
