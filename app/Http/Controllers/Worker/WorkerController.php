<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Personal;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct()
    {
        //?Ensuring That User is First Loged in 
        $this->middleware(['auth']);
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
    {   //?Validating the request input
        $this->validate($request,[
            'name' => 'required|unique:personals,task_name',
            'Details' =>'required',
        ]);
        //? Assigning The Variables to the DB table : personal 
        $personal  = new Personal();
        $personal->task_name = $request->name;
        $personal->task_detail = $request->Details;
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
        //TODO: Remeber to add the status field to the migration.
        $personal->save();
    }
    public function task_management()
    {
        return view('User.task-management');
    }
    public function team_task()
    {
        return view('User.team-task');
    }
    public function team_lead()
    {
        return view('User.TeamLead');
    }
    public function team_member()
    {
        return view('User.TeamMember');
    }
}
