@extends('layout.User_layout.layout')

@section('content')


    <div class="row">
        <div class="col-xl-14 col-xxl-4 mb-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-heading">
                        <h4 class="card-title">Recent Task Details</h4>
                    </div>
                    <div class="dropdown">
                        <form action="{{ route('viewdetails') }}" method="POST">
                            @csrf
                            <input type="hidden" name="team_name" value="{{ $Name }}">
                            <button type="submit" class="btn btn-round btn-inverse-primary">View Details </button>
                        </form>
                    </div>
                </div>
                <div class="card-body">
                    
                    
                        <div class="row align-items-center m-b-20">
                            @foreach ($Done as $TMT)
                                    <div class="col-12 col-sm-7 mb-3 mb-sm-3">
                                        <h4 class="mb-0">{{ $TMT->task_name }} </h4>
                                        
                                        <h6>{{ $TMT->created_at->diffForHumans() }}
                                            @if ($TMT->status == "Done")
                                                <a href="javascript:void(0)" class="badge badge-success-inverse">{{ $TMT->status }}</a></h6>
                                            @else
                                            <a href="javascript:void(0)" class="badge badge-danger-inverse">{{ $TMT->status }}</a></h6>
                                            @endif
                                            
                                        
                                    </div>
                            @endforeach
                            
                        </div>
                    
                 </div>
                
            </div>
        </div>
       
        
        <div class="col-lg-14 col-xxl-4 m-b-30">
            <div class="card card-statistics h-100 mb-0">
                <div class="card-header">
                    <h4 class="card-title">Team Memebers</h4>
                </div>
                <div class="card-body scrollbar scroll_dark" style="height: 380px;">
                    @foreach ($Members as $key)
                        @if($key->name != auth()->user()->name )
                            <div class="row align-items-center m-b-20">
                                <div class="col-4 col-xs-2">
                                    <div class="bg-img">
                                        <img style="height: 50px" class="img-fluid" src="{{ asset($key->image) }}" alt="user">
                                    </div>
                                </div>
                                <div class="col-8 col-xs-6">
                                    
                                    <h5 class="mb-0">{{ $key->name }}</h5>
                                    <span>{{ $key->email }}</span>
                                </div>
                                <div class="col-xs-4 mt-3 mt-xs-0">
                                    <form action="{{ route('TeamMemeberTracker') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="name" value="{{ $key->name }}">
                                        <input type="hidden" name="team" value="{{ $Name }}">
                                        <input type="hidden" name="user_id" value="{{ $key->id }}">
                                        <button type="submit" class="btn btn-primary">Show Task</button>
                                    </form>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    
                    
                </div>
            </div>
        </div>

        <div class="col-lg-14 col-xxl-4 m-b-30">
            <div class="card card-statistics">
                <div class="card-header">
                    <div class="card-heading">
                        <h4 class="card-title">{{ $Name }} Task Designation</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('userLead') }}">
                        @csrf
                        <div class="form-group">
                            <label >Task Header</label>
                            <input type="text" name="header" class="form-control"placeholder="Enter Task Name">
                        </div>
                        <div class="form-group">
                            <select class="js-basic-single form-control" name="state">
                                <optgroup label="{{ $Name }} Team Members">
                                    @foreach ($Members as $key)
                                        @if ($key->name == auth()->user()->name)
                                            
                                        @else
                                        <option value="{{ $key->id }}">{{ $key->name }}</option> 
                                        
                                        @endif
                                    @endforeach
                                    <input type="hidden" name="team" value="{{ $Name }}">
                                </optgroup>
                            </select>
                            <input type="hidden" name="">
                        </div>
                        <div class="form-group">
                            <label>Task Details</label>
                            <textarea type="text" class="form-control" name="Details" rows="10" placeholder="Task Details"></textarea>
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection