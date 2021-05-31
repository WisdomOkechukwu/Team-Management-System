<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\TeamMemberTask;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
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
    public function index()
    {
        //?outputing the data inside teammembers table 
        $value = TeamMember::select('*')
        ->where('user_id','=', auth()->user()->id )
        ->get();
        
        //? Using Eloquent to output the teams related to a user 
        $user = User::find(auth()->user()->id);
        $users  = $user->teams;

        //?outputing the data inside personal table 
        $personal_task = Personal::select('*')
                        ->where('user_id','=', auth()->user()->id )
                        ->get();
        
        

        //? Returing the View with data passed into it.
        return view('User.Dashboard',[
            'TeamMember' => $value,
            'Team' => $users,
            'Personal'=>$personal_task,
        ]);
    }
    
    public function personal_task(Request $request)
    {   
        //?Validating the request input
        $this->validate($request,[
            'name' => 'required|unique:personals,task_name',
            'Details' =>'required',
        ]);
        //? Assigning The Variables to the DB table : personal 
        $personal  = new Personal();
        $personal->task_name = $request->name;
        $personal->task_detail = $request->Details;
        $personal->Status = 'Undone';
        $personal->user_id = auth()->user()->id;
        $personal->save();
        
        //? Returning back to the Admin Dashboard
        echo $this->index();
    }
    public function personal_task_done(Request $request)
    {   
        //?Finding the task using the ID
        $personal = Personal::find($request->id);
        $personal->status = 'Done';
        
        $personal->save();
        echo $this->index();
    }
    public function team_member($name)
    {
        
        $Members = Team::select('*')
            ->where('team_name','=', $name )
            ->get();

            //?Seeting team Key ID 
            $teamiD = 0;
            foreach($Members as $key){
                $teamiD = $key->id;
            }
        //? Getting Users Under the Team
        $teami = Team::find($teamiD);
         $teams = $teami->users;
        
        $tem = $this->team_Mem();
        $userss = $this->user();
        return view('User.TeamMember',[
            'Member' => $teams,
            'TeamMember' => $tem,
            'Team' => $userss,
            'Name' => $name,
        ]);
    }
    public function task_management()
    {
        return view('User.task-management');
    }
    public function team_task(Request $request)
    {
        $data = Team::select('*')
            ->where('team_name','=', $request->team )
            ->get();

            //?Seeting team Key ID 
            $teamiD = 0;
            foreach($data as $key){
                $teamiD = $key->id;
            }
        //? Creating an instance of TeamMemberTask table 
        $team_member_task = new TeamMemberTask();
        $team_member_task->task_name = $request->header;
        $team_member_task->task_detail = $request->Details;
        $team_member_task->status = 'Undone';
        $team_member_task->team_id = $teamiD;
        $team_member_task->user_id = $request->state;
        $team_member_task->Biz_id = auth()->user()->Biz_id;

        $team_member_task->save();
        
        echo $this->team_lead($request->team);
        
    }
    public function team_lead($name)
    {
        
        
        $tem = $this->team_Mem();
        $userss = $this->user();
        
        
        $Members = Team::select('*')
        ->where('team_name','=', $name )
        ->where('Biz_id','=', auth()->user()->Biz_id )
        ->get();

        //?Setting team Key ID 
        $teamiD = 0;
        foreach($Members as $key){
            $teamiD = $key->id;
        }

        $team_member = TeamMemberTask::select('*')
        ->where('team_id','=', $teamiD)
        ->where('Biz_id','=', auth()->user()->Biz_id)
        ->latest()
        ->limit(5)
        ->get();

        //? Getting Users Under the Team
        $teami = Team::find($teamiD);
        $teams = $teami->users;

        

        return view('User.TeamLead',[
            'TeamMember' => $tem,
            'Team' => $userss,
            'Members' => $teams,
            'Name' =>$name,
            'Done' => $team_member,
        ]);
    }

    public function Done($name)
    {
        $tem = $this->team_Mem();
        $userss = $this->user();
        return view('User.done',[
            'TeamMember' => $tem,
            'Team' => $userss,
        ]);
    }
    
}
