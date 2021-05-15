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
        $server_name = $_SERVER['HTTP_HOST'];
        $teamed = Team::select('*')
            ->where('Biz_id','=', auth()->user()->id)
            ->get();

        
        return view('Admin.admin',[
            'Worker'=> $value,
            'server' =>$server_name,
            'Teams' => $teamed,
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
    public function show_team_lead($team)
    {
       
        $team = Team::select('*')
            ->where('team_name','=', $team )
            ->get();

            $teamiD = 0;
            foreach($team as $key){
                $teamiD = $key->id;
            }

        $teami = Team::find($teamiD);
         $teams = $teami->users;

         
         
        return view('Admin.add-team-lead',[
            'Members' => $teams,
            'Team' => $teamiD
        ]);
    }

    public function add_team_lead(Request $request)
    {
        
        $user_id = $request->user_id;
        $team_id = $request->team_id;

        $team = TeamMember::select('*')
            ->where('user_id','=', $user_id )
            ->where('team_id','=', $team_id )
            ->get();

        $teamId = 0;
        foreach($team as $key){
            $teamId = $key->id;
        }
        $team_update =  TeamMember::find($teamId);
        $team_update->user_id = $user_id;
        $team_update->team_id = $team_id;
        $team_update->status = "Lead";
        $team_update->Biz_id = auth()->user()->id;

        $team_update->save();

        $value = $this->employee_select();
        $server_name = $_SERVER['HTTP_HOST'];
        $teamed = Team::select('*')
            ->where('Biz_id','=', auth()->user()->id)
            ->get();

        
        return view('Admin.admin',[
            'Worker'=> $value,
            'server' =>$server_name,
            'Teams' => $teamed,
        ]);
        
    }

    public function add_team_members(Request $request)
    {
        $User_id = User::find($request->id);
            $team = Team::select('*')
            ->where('team_name','=', $request->team )
            ->get();

            
            
            $teamiD = 0;
            foreach($team as $key){
                $teamiD = $key->id;
            }
        
        $value = $this->employee_select();
        $Searcher = TeamMember::select('*')
        ->where('user_id','=', $request->id)
        ->where('team_id','=', $teamiD)
        ->get();
        
        
        
        if(count($Searcher) == 0){


            $User_id = User::find($request->id);
            $team = Team::select('*')
            ->where('team_name','=', $request->team )
            ->get();

            
            
            $teamiD = 0;
            foreach($team as $key){
                $teamiD = $key->id;
            }
            
            $Team_Memeber = new TeamMember();
            $Team_Memeber->user_id = $User_id->id;
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
                'data' => "Already In The Team",
                'Employee'=> $value,
                'Team_name' =>$request->team,
                ]);
        }



        
       
    }
    public function edit_team(){
        return view('Admin.edit-team');
    }
}
