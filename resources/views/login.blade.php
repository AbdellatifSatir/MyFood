<!DOCTYPE html>
<html>

<head>
  @include('includes.header')
  <title> Feane </title>
  <style>
    body {
        background-color:;
    }
  </style>
</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
          <img src="assets/images/hero-bg.jpg" alt="">
        </div>
        
        @include('includes.navbar')
    </div>

    <!--- Auth section-->

    <div class="container">
        <div class="row py-5 mt-4 align-items-center">


            <!-- Login Form -->
            <div class="col-md-7 col-lg-6 ml-auto">
                <img src="assets/images/favicon.png" alt="" width="300" height="300">
            </div>
            <!-- End Login Form -->


            <!-- Registeration Form -->
            <div class="col-md-6 pr-lg-6 mb-6 mb-md-0">

                <form action="{{ Route('Login') }}" method="POST">
                    @csrf
                   
                    <!-- Success Message -->
                    @if(Session::has('fail'))
                    <div class="alert alert-danger">
                        {{Session::get('fail')}}
                    </div>
                    @endif

                    <div class="row">

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">Login</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>
    
                        <!-- Email  -->
                        @if($errors->has('email'))
                        <div class="error bg-light text-danger">
                            {{$errors->first('email')}}
                        </div>
                        @endif
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-envelope text-muted"></i>
                                </span>
                            </div>
                            <input id="email" type="email" name="email" placeholder="Email Address" class="form-control bg-white border-left-0 border-md" value="{{old('email')}}">
                        </div>
    
                        <!-- Password -->
                        @if($errors->has('password'))
                        <div class="error bg-light text-danger">
                            {{$errors->first('password')}}
                        </div>
                        @endif
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-lock text-muted"></i>
                                </span>
                            </div>
                            <input id="password" type="password" name="password" placeholder="Password" class="form-control bg-white border-left-0 border-md">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-warning text-light">Login</button>

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                    </div>
            </div>


        </div>
    </div>
    <!--end Auth section-->


<!-- footer section -->


@include('includes.scripts')
</body>
</html>