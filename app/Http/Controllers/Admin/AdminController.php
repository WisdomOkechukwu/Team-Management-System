<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
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


    public function addTeam(Request $request)
    {
        $team = new Team();
        
        $team->team_name = $request->task;
        $team->team_objectives = $request->details;
        $team->status  = 'Pending';
        $team->start_date = $request->from;
        $team->end_date = $request->to;
        $team->Biz_id = auth()->user()->id;
        $team->save();
        
        
        $value = $this->employee_select();
        
        return view('Admin.add-team-members',[
            'Employee'=> $value,
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
