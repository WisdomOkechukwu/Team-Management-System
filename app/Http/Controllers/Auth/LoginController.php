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
        //? Validating The Request Data
        $this->validate($request,[
            'email' =>'required|email',
            'password'=>'required',
         ]);
        //? Checking if the data matches the data in user table 
         if(!Auth::attempt($request->only('email','password'))){
            return back()->with('Login_Status','Invalid Login Details');
         }
         //? If Admin Route to Admin
         if(auth()->user()->status == "Admin")
         {
            return redirect()->route('AdminDashboard');
         }
         //? If Worker Route to Worker
         return redirect()->route('WorkerDashboard');
    }

    public function logout(){
        //? Logout User
        Auth::logout();
        //? Login Route
        return view('Auth.login');
    }
}
