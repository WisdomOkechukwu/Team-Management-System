<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="{{secure_asset('assets/img/favicon.ico')}}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ secure_asset('assets/css/style.css') }}" />
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            `
            <!-- begin app-header -->
            <header class="app-header top-bar">
                <!-- begin navbar -->
                <nav class="navbar navbar-expand-md">

                    <!-- begin navbar-header -->
                    <div class="navbar-header d-flex align-items-center">
                        <a href="javascript:void:(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
                        <a class="navbar-brand" href="index.html">
                            <img src="{{ secure_asset('assets/img/logo.png') }}" class="img-fluid logo-desktop" alt="logo" />
                            <img src="{{ secure_asset('assets/img/logo-icon.png') }}" class="img-fluid logo-mobile" alt="logo" />
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-align-left"></i>
                    </button>
                    <!-- end navbar-header -->
                    <!-- begin navigation -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="navigation d-flex">
                            
                            <ul class="navbar-nav nav-right ml-auto">
                                
                                
                                <li class="nav-item dropdown user-profile">
                                    <a href="javascript:void(0)" class="nav-link dropdown-toggle " id="navbarDropdown4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        
                                        <img src="{{secure_asset(auth()->user()->image)}}" alt="avtar-img">
                                        
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">{{ auth()->user()->name }}</h4>
                                                    <small class="text-white">{{ auth()->user()->email }}</small>
                                                </div>
                                                <a href="{{ route('logout') }}" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                                class="zmdi zmdi-power"></i></a>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- end navigation -->
                </nav>
                <!-- end navbar -->
            </header>
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                <aside class="app-navbar">
                    <!-- begin sidebar-nav -->
                    <div class="sidebar-nav scrollbar scroll_light">
                        <ul class="metismenu " id="sidebarNav">
                            <li class="nav-static-title">Personal</li>
                            {{-- Customr Area --}}
                            <li class="active"><a href="{{ route('WorkerDashboard') }}" aria-expanded="false"><i class="nav-icon zmdi zmdi-account-circle"></i><span class="nav-title">Dashboard</span></a> </li>
                           
                            
                            
                            
                            <li class="active">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon zmdi zmdi-folder-person"></i>
                                    <span class="nav-title">Team Task</span>
                                    <span class="nav-label label label-danger">new</span>
                                    
                                </a>
                                    @foreach ($TeamMember as $key)
                                        @if ($key->status =='Member')
                                            @foreach ($Team as $keys)
                                                
                                                @if ($keys->id == $key->team_id)
                                                    <ul aria-expanded="false">
                                                        <form action="" method="POST">
                                                            <li class="active"> <a href='index-job-portal.html'>{{ $keys->team_name }}</a> </li>
                                                        </form>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                            </li>     
                            
                            <li class="active">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon zmdi zmdi-folder-person"></i>
                                    <span class="nav-title">Team Lead Group(s)</span>
                                    
                                    
                                </a>
                                    @foreach ($TeamMember as $key)
                                        @if ($key->status =='Lead')
                                            @foreach ($Team as $keys)
                                                
                                                @if ($keys->id == $key->team_id)
                                                    <ul aria-expanded="false">
                                                        <form action="" method="POST">
                                                            <li class="active"> <a href='/leader/{{ $keys->team_name }}'>{{ $keys->team_name }}</a> </li>
                                                        </form>
                                                    </ul>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                            </li> 

                            <li class="active">
                                <a class="has-arrow" href="javascript:void(0)" aria-expanded="false">
                                    <i class="nav-icon zmdi zmdi-folder-person"></i>
                                    <span class="nav-title">Team Members</span>
                                    <span class="nav-label label label-danger">new</span>
                                    
                                </a>
                                    @foreach ($TeamMember as $key)
                                        
                                            @foreach ($Team as $keys)
                                                
                                                @if ($keys->id == $key->team_id)
                                                    <ul aria-expanded="false">
                                                        <li class="active">
                                                            <a href="/team-member/{{ $keys->team_name }}">{{ $keys->team_name }}</a>
                                                         </li>
                                                    </ul>
                                                @endif
                                            @endforeach
                                                    
                                    @endforeach
                            </li> 
                                
                            
                        </ul>
                    </div>
                    <!-- end sidebar-nav -->
                </aside>
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="user-welcome d-block d-xl-flex flex-nowrap align-items-center">
                                    <div class="bg-img mb-2 mb-xl-0 mr-3">
                                        <img class="img-fluid rounded" src="{{secure_asset(auth()->user()->image)}}" alt="user">
                                    </div>
                                    <div class="page-title mb-2 mb-xl-0">
                                        <h1 class="mb-1">Good Day, {{ auth()->user()->name }}</h1>
                                        </div>
                                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                                        
                                    </div>
                                    <div class="ml-xl-4 mt-xl-0 ml-0 mt-3 d-flex align-items-center">
                                        <div class="dropdown">
                                            {{-- For Team Lead --}}
                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#teamModal" aria-haspopup="true" aria-expanded="false">
                                                Add New Personal Task
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                        {{-- Start  --}}
                       
                        @yield('content')
                        
                    </div>
                    <!-- end container-fluid -->
                    </div>
                    <!-- end app-main -->
                    </div>
                    <!-- end app-container -->
                    <!-- begin footer -->
                    <footer class="footer">
                    <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-left">
                        <p>&copy; Copyright 2019. All rights reserved.</p>
                    </div>
                    <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                        <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                    </div>
                    </div>
                    </footer>
                    <!-- end footer -->
                    </div>
                    <!-- end app-wrap -->
                    </div>
                    <!-- end app -->
                    
                    <!-- plugins -->
                    <script src="{{secure_asset('assets/js/vendors.js')}}"></script>
                    
                    <!-- custom app -->
                    <script src="{{secure_asset('assets/js/app.js')}}"></script>
                    
                    {{-- Add Team Modal --}}
                    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Personal Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('personal') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="modelemail">Task Name</label>
                                            <input @error('name') style="border-color: red;"@enderror 
                                            type="text" name="name" class="form-control" id="modelemail" value="{{ old('name') }}">
                                            @error('name')
                                            <h6 style="color: red">{{ $message }}</h6>
                                            <script>alert("{{ $message }}");</script>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="modelpass">Task Details</label>
                                            <textarea
                                            @error('Details') style="border-color: red;"@enderror
                                            type="text" name="Details" class="form-control" id="modelpass" rows="10">{{ old('Details') }}</textarea>
                                            @error('Details')
                                            <h6 style="color: red">{{ $message }}</h6>
                                            <script>alert("{{ $message }}");</script>
                                        @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Personal Task</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('personal') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="modelemail">Task Name</label>
                                            <input @error('name') style="border-color: red;"@enderror 
                                            type="text" name="name" class="form-control" id="modelemail" value="{{ old('name') }}">
                                            @error('name')
                                            <h6 style="color: red">{{ $message }}</h6>
                                            <script>alert("{{ $message }}");</script>
                                        @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="modelpass">Task Details</label>
                                            <textarea
                                            @error('Details') style="border-color: red;"@enderror
                                            type="text" name="Details" class="form-control" id="modelpass" rows="10">{{ old('Details') }}</textarea>
                                            @error('Details')
                                            <h6 style="color: red">{{ $message }}</h6>
                                            <script>alert("{{ $message }}");</script>
                                        @enderror
                                        </div>
                                        <button type="submit" class="btn btn-primary">Proceed</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </body>
                    
                    
                    </html>