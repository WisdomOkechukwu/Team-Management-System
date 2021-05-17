
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
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
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
                            <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid logo-desktop" alt="logo" />
                            <img src="{{ asset('assets/img/logo-icon.png') }}" class="img-fluid logo-mobile" alt="logo" />
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
                                        <img src="{{ asset(auth()->user()->image) }}" alt="avtar-img">
                                        <span class="bg-success user-status"></span>
                                    </a>
                                    <div class="dropdown-menu animated fadeIn" aria-labelledby="navbarDropdown">
                                        <div class="bg-gradient px-4 py-3">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="mr-1">
                                                    <h4 class="text-white mb-0">{{ auth()->user()->name }}</h4>
                                                    <small class="text-white">{{ auth()->user()->email }}</small>
                                                </div>
                                                <a href="#" class="text-white font-20 tooltip-wrapper" data-toggle="tooltip" data-placement="top" title="" data-original-title="Logout"> <i
                                                                class="zmdi zmdi-power"></i></a>
                                            </div>
                                        </div>
                                        <div class="p-4">
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                                                <i class="fa fa-user pr-2 text-success"></i> Profile</a>
                                            <a class="dropdown-item d-flex nav-link" href="javascript:void(0)" data-toggle="modal" data-target="#loginModal">
                                                <i class="fa fa-compass pr-2 text-warning"></i> Registration Link</a>

                                                
                                            
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
                            {{-- Admin SideBar  Navigation--}}
                            <li class="active"><a href="{{ route('AdminDashboard') }}" aria-expanded="false"><i class="nav-icon zmdi zmdi-account-circle"></i><span class="nav-title">Dashboard</span></a> </li>
                            
                            <li class="active"><a href="{{ route('TeamManagement') }}" aria-expanded="false"><i class="nav-icon zmdi zmdi-accounts-alt"></i><span class="nav-title">Team Management</span></a> </li>
                            <li class="active"><a href="{{ route('Employee') }}" aria-expanded="false"><i class="nav-icon zmdi zmdi-accounts-list"></i><span class="nav-title">Employee</span></a> </li>
                                
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
                                        <img class="img-fluid rounded" src="{{ asset(auth()->user()->image) }}" alt="user">
                                    </div>
                                    <div class="page-title mb-2 mb-xl-0">
                                        <h1 class="mb-1">Good Morning, {{ auth()->user()->name }}</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center secondary-menu text-center">
                                        
                                    </div>
                                    <div class="ml-xl-4 mt-xl-0 ml-0 mt-3 d-flex align-items-center">
                                        <div class="dropdown">
                                            <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#teamModal" aria-haspopup="true" aria-expanded="false">
                                                Add New Team
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end page title -->
                        </div>
                        <!-- end row -->
                        <!-- begin row -->
                       
                        @yield('content')
                        
                        <!-- end row -->
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
    <script src="{{ asset('assets/js/vendors.js') }}"></script>

    <!-- custom app -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    {{-- Add Team Modal --}}
    <div class="modal fade" id="teamModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Team</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('AdminDashboard') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="modelemail">Team Name</label>
                            <input @error('task') style="border-color: red;"@enderror  
                            name="task" type="text" class="form-control" id="modelemail" required>
                            @error('task')
                                <h6 style="color: red">{{ $message }}</h6>
                                <script>alert("{{ $message }}");</script>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="modelpass">Team Task</label>
                            <textarea name="details" type="text" class="form-control" id="modelpass" required></textarea>
                        </div>

                        
                        <div class="form-group">
                            <label for="modelpass">Project Duration</label>
                            <div class="input-group" data-date="23/11/2018" data-date-format="mm/dd/yyyy">
                                <input type="text" class="form-control range-from" name="from" placeholder="Start Date" required>
                                <span class="input-group-addon">To</span>
                                <input class="form-control range-to" type="text" placeholder="End Date" name="to" required>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Proceed</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- Customized Link --}}
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Registration Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="modelemail">Link</label>
                            <input type="text" class="form-control" 
                            id="myInput" value="http://{{ $_SERVER['HTTP_HOST'] }}/register/{{ auth()->user()->company_slug }}" readonly>
                        </div>
                        
                        <button onclick="myFunction()" class="btn btn-primary">COPY</button>
                        <script>
                            function myFunction() {
                              var copyText = document.getElementById("myInput");
                              copyText.select();
                              copyText.setSelectionRange(0, 99999)
                              document.execCommand("copy");
                              alert("Copied the text: " + "copied");
                            }
                            </script>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</body>


</html>