<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index()
    {
        return view('User.Dashboard');
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
