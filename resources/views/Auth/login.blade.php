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
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/vendors.css') }}" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">Log In</h1>
                                        <p>Welcome, please login to your account.</p>
                                        <form action="{{ route('login') }}" method="POST" class="mt-3 mt-sm-5">
                                            <div class="row">

                                                @csrf
                                                <div class="col-12">
                                                    @if (session('Login_Status'))
                                                    <h6 style="color: red">{{ session('Login_Status') }}</h6>
                                                    @endif
                                                    
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input @error('email') style="border-color: red;"@enderror
                                                         type="text" name="email" class="form-control" placeholder="Email" 
                                                         value="{{ old('email') }}" />
                                                        @error('email')
                                                            <h6 style="color: red">{{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password</label>
                                                        <input @error('password') style="border-color: red;"@enderror 
                                                        type="password" name="password" class="form-control" placeholder="Password" />
                                                        @error('password')
                                                            <h6 style="color: red">{{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary text-uppercase">Sign In</button>
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>Don't have an account ?<a href="{{ route('register') }}"> Sign Up</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="{{ asset('assets/img/bg/login.svg')}}" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="{{ asset('assets/js/vendors.js') }}"></script>

    <!-- custom app -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    
    
</body>


</html>