<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    public function index()
    {
        $value = TeamMember::select('*')
        ->where('user_id','=', auth()->user()->id )
        ->get();
        
        $user = User::find(auth()->user()->id);
        $users  = $user->teams;
        


        return view('User.Dashboard',[
            'TeamMember' => $value,
            'Team' => $users,
        ]);
    }
    public function personal_task(Request $request)
    {
        dd($request);
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
