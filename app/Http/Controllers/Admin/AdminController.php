<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function employee_select()
    {
        //?Getting Workers From databse:users with output of 5 Members.
        $value = User::select('*')
        ->where('Biz_id','=', auth()->user()->id )
        ->where('status','=', 'Worker' )
        ->limit('5')
        ->get();
        return $value;
    }


    public function index()
    {   
        //?Retrieving return vakue from function employee_select
        $value = $this->employee_select();
        //?Getting the host name
        $server_name = $_SERVER['HTTP_HOST'];
        //?Getting the teams under an organization
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
        //?Retrieving return vakue from function employee_select
        $value = $this->employee_select();
        return view('Admin.employee-list',[
            'Worker'=> $value,
        ]);
    }


    public function addTeam(Request $request)
    {
        //? validating the Request data
        $this->validate($request,[
            'task' => 'unique:teams,team_name',
        ]);
        //? Creating new instance of teams table.
        $team = new Team();
        
        $team->team_name = $request->task;
        $team->team_objectives = $request->details;
        $team->status  = 'Pending';
        $team->start_date = $request->from;
        $team->end_date = $request->to;
        $team->Biz_id = auth()->user()->id;
        $team->save();
        
        //?Retrieving return vakue from function employee_select
        $value = $this->employee_select();
        
        return view('Admin.add-team-members',[
            'Employee'=> $value,
            'Team_name' =>$request->task,
        ]);

    }

    
    public function show_team_lead($team)
    {
       //?Retrieving team data using team name
        $team = Team::select('*')
            ->where('team_name','=', $team )
            ->get();
            //?Seeting team Key ID 
            $teamiD = 0;
            foreach($team as $key){
                $teamiD = $key->id;
            }
        //? Getting Users Under the Team
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
        //? 
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

    public function team_management()
    {   
        $teamed = Team::select('*')
            ->where('Biz_id','=', auth()->user()->id)
            ->get();
        return view('Admin.team-management',[
            'Teams' => $teamed,
        ]);
    }
    public function edit_team(Request $request)
    {
        
        switch ($request->input('action')) {
            case 'edit':
                $data_status = TeamMember::select('*')
                ->where('team_id','=', $request->team )
                ->get();
                

                $team = Team::find($request->team);
                
                $teams = $team->users;
                return view('Admin.edit-team',[
                    'Status'=>$data_status,
                    'Users' => $teams,
                    'Name' => $team->team_name,
                ]);
                break;
            
            case 'delete':
                $teamed = Team::whereId($request->team)->delete();
                return redirect()->route("AdminDashboard");
                break;
            
            default:
                # code...
                break;
        }

        // 
    }

    public function delete_team_data(Request $request)
    {
        
        $team_member = TeamMember::select('*')
            ->where('user_id','=', $request->user_id )
            ->where('team_id','=', $request->team_id )
            ->get();
        $team_member_id = 0;
        foreach($team_member as $key){
            $team_member_id = $key->id;
        }
        TeamMember::whereId($team_member_id)->delete();
        return redirect()->route('EditMember');
        

    }

    public function new_member($name)
    {
        $team = Team::select('*')
        ->where('team_name','=', $name )
        ->get();

        $teamID = 0;
        foreach($team as $key){
            $teamID = $key->id;
        }
        

        $teamed = Team::find($teamID);
        $teams = $teamed->users;

       

        $user = User::select('*')
        ->where('Biz_id','=',auth()->user()->id)
        ->get();
        // dd($teams);
        $array_teams = array();
        $array_users = array();
        foreach($teams as $key)
        {
            array_push($array_teams,$key->id);
        }
        
        foreach($user as $keys)
        {
            array_push($array_users,$keys->id);
        }
        
        $result = array_diff($array_users,$array_teams);
        $array_user_not_added = array();
        foreach($result as $keys)
        {
            $user_data = User::find($keys);
            array_push($array_user_not_added,$user_data);
        }
        
        
        
        return view('Admin.team_management.edit',[
            'Users' => $array_user_not_added,
            'Name' => $name,
            'TeamID' => $teamID,
        ]);

            

    }

    public function new_member_post(Request $request){
            
            $Team_Memeber = new TeamMember();
            $Team_Memeber->user_id = $request->user_id;
            $Team_Memeber->team_id = $request->team_id;
            $Team_Memeber->status = "Member";
            $Team_Memeber->Biz_id = auth()->user()->id;

            $Team_Memeber -> save();
            


        
        $teamed = Team::find($request->team_id);
        $teams = $teamed->users;

       

        $user = User::select('*')
        ->where('Biz_id','=',auth()->user()->id)
        ->get();
        
        $array_teams = array();
        $array_users = array();
        foreach($teams as $key)
        {
            array_push($array_teams,$key->id);
        }
        
        foreach($user as $keys)
        {
            array_push($array_users,$keys->id);
        }
        
        $result = array_diff($array_users,$array_teams);
        $array_user_not_added = array();
        foreach($result as $keys)
        {
            $user_data = User::find($keys);
            array_push($array_user_not_added,$user_data);
        }
        
        
        
        return view('Admin.team_management.edit',[
            'Users' => $array_user_not_added,
            'Name' => $request->name,
            'TeamID' => $request->team_id,
        ]);
        

    }

    public function new_lead($name)
    {
        $team = Team::select('*')
            ->where('team_name','=', $name )
            ->get();

            
            
            $teamID = 0;
            foreach($team as $key){
                $teamID = $key->id;
            }
            
            $data_status = TeamMember::select('*')
            ->where('team_id','=', $teamID )
            ->get();
            

            $team = Team::find($teamID);
            
            $teams = $team->users;
            
            

            return view('Admin.team_management.lead',[
                'Status'=>$data_status,
                'Users' => $teams,
                'Name' => $team->team_name,
            ]);

    }
    public function new_lead_post(Request $request)
    {       
        $affected = DB::table('team_members')
                    ->where('status', '=', 'Lead')
                    ->where('team_id', '=', $request->team_id )
                    ->update(array('status' => 'Member'));
        $leader = DB::table('team_members')
                    ->where('user_id', '=', $request->user_id)
                    ->where('team_id', '=', $request->team_id)
                    ->update(array('status' => 'Lead'));
        
        $data_status = TeamMember::select('*')
        ->where('team_id','=', $request->team_id )
        ->get();
        

        $team = Team::find($request->team_id);
        
        $teams = $team->users;
        
        
        
        return view('Admin.team_management.lead',[
            'Status'=>$data_status,
            'Users' => $teams,
            'Name' => $request->name,
        ]);
        

        
        
    }
}
