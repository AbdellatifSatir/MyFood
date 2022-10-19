<!DOCTYPE html>
<html>

<head>
  @include('includes.header')
  <title> Feane </title>
  <style>
    body {
        background-color:rgb(226, 226, 226);
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
<!--section class="about_section layout_padding"-->
    
    <div class="container">
        <div class="row py-5 mt-4 align-items-center">


            <!-- Login Form -->
            <div class="col-md-5 pr-lg-5 mb-5 mb-md-5 ml-5">

                <!--img src="assets/images/favicon.png" alt="" width="300" height="300"-->
                <img src="assets/images/about-img.png" alt="" width="500" height="500">
  
            </div>
            <!-- End Login Form -->


            <!-- Registeration Form -->
            <div class="col-md-7 col-lg-6 ml-auto">

                <!-- Success Message -->
                @if(Session::has('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif

                <form action="{{ Route('Register') }}" method="POST">
                    @csrf
                   
                    @php
                        /*use Illuminate\Support\Facades\Validator;
                        $validator = new Validator();
                        $errors = $validator->errors();
                        echo $errors->first('email');*/
                    @endphp

                    <div class="row">

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">Register</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>
    
                        <!-- First Name -->
                        @if($errors->has('firstname'))
                          <div class="error bg-light text-danger">
                             {{ $errors->first('firstname') }}
                          </div>
                         @endif
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="firstName" type="text" name="firstname" placeholder="First Name"   class="form-control" value="{{old('firstname')}}">
                        </div>
    
                        <!-- Last Name -->
                        @if($errors->has('lastname'))
                        <div class="error bg-light text-danger">
                            {{$errors->first('lastname')}}
                        </div>
                        @endif
                        <div class="input-group col-lg-6 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-user text-muted"></i>
                                </span>
                            </div>
                            <input id="lastName" type="text" name="lastname" placeholder="Last Name" class="form-control bg-white border-left-0 border-md" value="{{old('lastname')}}">
                        </div>

                        <!-- Adress -->
                        @if($errors->has('adress'))
                        <div class="error bg-light text-danger">
                            {{$errors->first('adress')}}
                        </div>
                        @endif
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-map-marker text-muted"></i>
                                </span>
                            </div>
                            <textarea id="email" type="text" name="adress" placeholder="Address" class="form-control bg-white border-left-0 border-md"></textarea>
                        </div>

                        <!-- Phone Number -->
                        @if($errors->has('phone'))
                        <div class="error bg-light text-danger">
                            {{$errors->first('phone')}}
                        </div>
                        @endif
                        <div class="input-group col-lg-12 mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-white px-4 border-md border-right-0">
                                    <i class="fa fa-phone-square text-muted"></i>
                                </span>
                            </div>
                            <!--select id="countryCode" name="countryCode" style="max-width: 80px" class="custom-select">
                                <option value="">+212</option>
                            </!--select-->
                            <input id="phoneNumber" type="tel" name="phone" placeholder="Phone Number" class="form-control bg-white border-md border-left-0 pl-3" value="{{old('phone')}}">
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

                        <!-- Type -->
                        <div class="input-group col-lg-6">
                            <input id="password" type="hidden" name="type"class="form-control bg-white border-left-0 border-md" value="Client">
                        </div>
    
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-warning text-light">Register</button>

                        <!-- Divider Text 
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 mr-5"></div>
                            
                        </div>-->

                        <!-- Divider Text -->
                        <div class="form-group col-lg-12 mx-auto d-flex align-items-center my-4">
                            <div class="border-bottom w-100 ml-5"></div>
                            <span class="px-2 small text-muted font-weight-bold text-muted">Or</span>
                            <div class="border-bottom w-100 mr-5"></div>
                        </div>

                        <a href="{{Route('Login')}}" class="btn btn-secondary text-light" >Login Here</a> 

    
                    </div>
                </form>
            </div>


        </div>
    </div>
<!--/section-->
    <!--end Auth section-->

    
  <!-- footer section -->
  @include('includes.footer')

  @include('includes.scripts')
  </body>
</html>