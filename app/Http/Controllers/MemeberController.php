<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamMemberTask;
use App\Models\User;
use Illuminate\Http\Request;

class MemeberController extends Controller
{
    public function __construct()
    {
        //?Ensuring That User is First Loged in 
        $this->middleware(['auth']);
    }

    public function Team_Mem()
    {
        $value = TeamMember::select('*')
        ->where('user_id','=', auth()->user()->id )
        ->get();
        return $value;
    }
    public function  user()
    {
        $user = User::find(auth()->user()->id);
        $users  = $user->teams;
        return $users;
    }

    public function show_task(Request $request){

        $TeamName = Team::select('*')
        ->where('team_name','=', $request->team )
        ->where('Biz_id','=', auth()->user()->Biz_id )
        ->get();

        //?Setting team Key ID 
        $teamiD = 0;
        foreach($TeamName as $key){
            $teamID = $key->id;
        }
        $task = TeamMemberTask::select('*')
        ->where('user_id','=', $request->user_id )
        ->where('team_id','=', $teamID )
        ->where('Biz_id','=', auth()->user()->Biz_id )
        ->latest()
        ->get();

        $tem = $this->team_Mem();
        $userss = $this->user();

        

        return view('User.usertasks',[
            'TeamMember' => $tem,
            'Team' => $userss,
            'Task' => $task,
            'Name'=>$request->name,
        ]);

        
        
    }

    public function view_details(Request $request){
        $Members = Team::select('*')
        ->where('team_name','=', $request->team_name )
        ->where('Biz_id','=', auth()->user()->Biz_id )
        ->get();

        //?Setting team Key ID 
        $teamiD = 0;
        foreach($Members as $key){
            $teamiD = $key->id;
        }

        $MemberTask = TeamMemberTask::select('*')
        ->where('team_id','=', $teamiD )
        ->where('Biz_id','=', auth()->user()->Biz_id )
        ->latest()
        ->get();

        $teami = Team::find($teamiD);
        $teams = $teami->users;

        $tem = $this->team_Mem();
        $userss = $this->user();
        return view('User.done',[
            'MemberTask' =>$MemberTask,
            'TeamMember' => $tem,
            'Memebers' =>$teams,
            'Team' => $userss,
        ]);
    }
    public function getTaskById($id){
        $task = TeamMemberTask::find($id);
        return response()->json($task);
    }
    
}
