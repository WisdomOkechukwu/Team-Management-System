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
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="register p-5">
                                        <h1 class="mb-2">Sign Up</h1>
                                        <p>Welcome, Please create your account.</p>
                                        <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data" class="mt-2 mt-sm-5">
                                            @csrf
                                            <div class="row">
                                              
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Name</label>
                                                        <input @error('name') style="border-color: red;"@enderror
                                                         type="text" name="name" class="form-control" placeholder="Name"
                                                          value="{{ old('name') }}" />
                                                         @error('name')
                                                            <h6 style="color: red">{{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Company name</label>
                                                        <input @error('company_name') style="border-color: red;"@enderror
                                                         type="text" name="company_name" class="form-control" placeholder="Company Name"
                                                         value="{{ old('company_name') }}" />
                                                         @error('company_name')
                                                            <h6 style="color: red">{{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Insert Image</label>
                                                        <input @error('picture') style="border-color: red;"@enderror
                                                         type="file" name="picture" class="form-control" placeholder="Password" />
                                                        @error('picture')
                                                            <h6 style="color: red">{{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email</label>
                                                        <input @error('email') style="border-color: red;"@enderror
                                                         type="text" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" />
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

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Confirm Password</label>
                                                        <input @error('password_confirmation') style="border-color: red;"@enderror
                                                         type="password" name="password_confirmation"
                                                         class="form-control" placeholder="Re-Enter Password" />
                                                         @error('password_confirmation')
                                                            <h6 style="color: red">{{ $message }}</h6>
                                                        @enderror
                                                    </div>
                                                </div>
                                                
                                                
                                                <div class="col-12 mt-3">
                                                    <button type="submit"  class="btn btn-primary text-uppercase">Sign up</button>
                                                </div>
                                                <div class="col-12  mt-3">
                                                    <p>Already have an account ?<a href="{{ route('login') }}"> Sign In</a></p>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="assets/img/bg/login.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->



    <!-- plugins -->
    <script src="assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="assets/js/app.js"></script>
</body>

</html>