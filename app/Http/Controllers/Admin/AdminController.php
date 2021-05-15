<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
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
        
        $this->validate($request,[
            'task' => 'unique:teams,team_name',
        ]);
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
            'Team_name' =>$request->task,
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
    
    public function add_team_members(Request $request)
    {
        $value = $this->employee_select();
        $Searcher = TeamMember::select('*')
        ->where('worker_id','=', $request->id)
        ->get();
        
        if(count($Searcher) ==0){


            $User_id = User::find($request->id);
            $team = Team::select('*')
            ->where('team_name','=', $request->team )
            ->get();

            
            
            $teamiD = 0;
            foreach($team as $key){
                $teamiD = $key->id;
            }
            
            $Team_Memeber = new TeamMember();
            $Team_Memeber->worker_id = $User_id->id;
            $Team_Memeber->team_id = $teamiD;
            $Team_Memeber->status = "Member";
            $Team_Memeber->Biz_id = auth()->user()->id;

            $Team_Memeber -> save();
            
            return view('Admin.add-team-members',[
                'data' => "Inserted",
                'Employee'=> $value,
                'Team_name' =>$request->team,
            ]);
        }
        else{
            
            return view('Admin.add-team-members',[
                'data' => "Already Inserted",
                'Employee'=> $value,
                'Team_name' =>$request->team,
                ]);
        }



        
       
    }
    public function edit_team(){
        return view('Admin.edit-team');
    }
}
