<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function employee_select()
    {
        $value = User::select('*')
        ->where('Biz_id','=', auth()->user()->id )
        ->where('status','=', 'Worker' )
        ->get();
        return $value;
    }


    public function index()
    {   
        $value = $this->employee_select();
        
        return view('Admin.admin',[
            'Worker'=> $value,
        ]);
    }

    
    
    public function employee()
    {
        $value = $this->employee_select();
        return view('Admin.employee-list',[
            'Worker'=> $value,
        ]);
    }
    public function team_management()
    {
        return view('Admin.team-management');
    }
    public function add_team_lead()
    {
        return view('Admin.add-team-lead');
    }
    public function add_team_members()
    {
        return view('Admin.add-team-members');
    }
    public function edit_team(){
        return view('Admin.edit-team');
    }
}
