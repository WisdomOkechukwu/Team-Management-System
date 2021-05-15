@extends('layout.Admin_layout.layout')

@section('content')

<div class="row">
                            
    <div class="col-xxl-8 mb-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Teams</h4>
                </div>
                
            </div>
            <div class="card-body">
                <div class="max-h-600 scrollbar scroll_dark" style="height: 400px">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table mb-0 table-borderless">
                            <thead class="bg-light">
                                <tr>
                                    <th>Project Name </th>
                                    <th> Start Date </th>
                                    <th> Due Date </th>
                                    
                                    <th>Status</th>
                                    
                                </tr>
                            </thead>
                            <tbody class="text-muted">
                                @foreach ($Teams as $key)
                                    
                                
                                <tr>
                                    <td>{{ $key->team_name }} </td>
                                    <td>{{ $key->start_date }} </td>
                                    <td>{{ $key->end_date }} </td>
                                    
                                    <td><label @if ($key->status == 'Pending')
                                        class="badge badge-danger-inverse"
                                    @else
                                    class="badge badge-success-inverse"
                                    @endif>{{ $key->status }}</label></td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
   
    </div>
    <div class="col-xl-6 col-xxl-4 mb-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Employee list</h4>
                </div>
                <div class="dropdown">
                    <a class="btn btn-round btn-inverse-primary " href="{{ route('Employee') }}">View All </a>
                </div>
            </div>
            <div class="card-body">
                @foreach ($Worker as $key)
                
                <div class="row align-items-center m-b-20">
                    <div class="col-12 col-sm-2 mb-3 mb-sm-0">
                        <div class="bg-img">
                            <img style="height: 59px;" class="img-fluid" src="{{ $key->image }}" alt="user">
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 mb-3 mb-sm-0">
                        <h4 class="mb-0">{{ $key->name }}</h4>
                        <a href="mailto:{{ $key->email }}" class="badge badge-primary-inverse">{{ $key->email }}</a>
                    </div>
                    
                </div>
                @endforeach
                
                
            </div>
            
        </div>
    </div>

    <div class="col-xl-6 col-xxl-4 mb-30">
        <div class="card card-statistics h-100 mb-0">
            <div class="card-header d-flex justify-content-between">
                <div class="card-heading">
                    <h4 class="card-title">Project Activity</h4>
                </div>
                <div class="dropdown">
                    <a class="p-2" href="#!" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-more-horizontal"></i>
                    </a>
                    <div class="dropdown-menu custom-dropdown dropdown-menu-right p-4">
                        <h6 class="mb-1">Action</h6>
                        <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-o pr-2"></i>View reports</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-edit pr-2"></i>Edit reports</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-bar-chart-o pr-2"></i>Statistics</a>
                        <h6 class="mb-1 mt-3">Export</h6>
                        <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-pdf-o pr-2"></i>Export to PDF</a>
                        <a class="dropdown-item" href="#!"><i class="fa-fw fa fa-file-excel-o pr-2"></i>Export to CSV</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="activity">
                    <li class="activity-item primary">
                        <div class="activity-info">
                            <h5 class="mb-0">Initial Briefing</h5>
                            <span>10:30 AM</span>
                        </div>
                    </li>
                    <li class="activity-item info">
                        <div class="activity-info">
                            <h5 class="mb-0"> Assign task for Smith. </h5>
                            <span>
                                    11.00 AM
                                </span>
                        </div>
                    </li>
                    <li class="activity-item success">
                        <div class="activity-info">
                            <h5 class="mb-0"> Complete milestone 3 and update. </h5>
                            <span>
                                    2.00 PM
                                </span>
                        </div>
                    </li>
                    <li class="activity-item danger">
                        <div class="activity-info">
                            <h5 class="mb-0">Start new task with mark. </h5>
                            <span>
                                    4.00 PM
                                </span>
                        </div>
                    </li>
                    <li class="activity-item warning">
                        <div class="activity-info">
                            <h5 class="mb-0">Release first milestone</h5>
                            <span>5.30 PM</span>
                        </div>
                    </li>
                    <li class="activity-item info">
                        <div class="activity-info">
                            <h5 class="mb-0"> Meeting with client and CEO.</h5>
                            <span>
                                    6.30 PM
                                </span>
                        </div>
                    </li>
                    <li class="activity-item success">
                        <div class="activity-info">
                            <h5 class="mb-0">Meeting with Amanda and team.</h5>
                            <span>
                                    8.00 PM
                                </span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection