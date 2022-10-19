<?php
$user= 'App\Models\User'::where('_id','=',Session::get('loginId'))->first();
?>
<!DOCTYPE html>
<html>

<head>
    @include('includes.header')
    <title>Admin Dashboard</title>
    <!--style-->
    @include('includes.sidebarCSS')
    @include('AdminDashs.AdminCSS')
     
</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
          <img src="{{asset('assets/images/hero-bg.jpg')}}" alt="">
        </div>
        @include('includes.navbar')
    </div>
    

    <div class="wrapper">

        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h4>Admin Dashboard</h4>
            </div>
    
            <ul class="list-unstyled components">
                <p><i class="fa fa-user" aria-hidden="true"></i>{{$user->firstname.' '.$user->lastname}}</p>
                <li> <a href="#">Home</a> </li>
                <li> <a href="/admin-dashboard">Add Meal</a> </li>
                <li> <a href="/admin-dashboard/meal-list">Meal List</a> </li>
                <li> <a href="/admin-dashboard/orders">Orders</a> </li>
            </ul>
        </nav>

        

        <!-- Page Content  -->
        <div id="content">
              
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class=" col-lg-10 col-md-8">
                        <div class="card p-3">

                            @if(Session::has('success'))
                            <div class="alert alert-success">
                                {{Session::get('success')}}
                            </div>
                            @endif

                            
                            <span><strong> Edit : </strong></span>
                            <br><br>

                            <form  class="form-card" method="POST" enctype="multipart/form-data" 
                            action="{{url('/admin-dashboard/meal-list/update/'.$meal['_id'])}}" >

                                @csrf
                                @method('PUT')

                                @if($errors->has('title'))
                                <div class="error bg-light text-danger">
                                    {{$errors->first('title')}}
                                </div>
                                @endif
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="input-group"> <input type="text" name="title" placeholder="title" value="{{$meal['title']}}"> <label>title</label> </div>
                                    </div>
                                </div>

                                @if($errors->has('description'))
                                <div class="error bg-light text-danger">
                                    {{$errors->first('description')}}
                                </div>
                                @endif
                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="input-group"> 
                                            <textarea type="text" id="cr_no" name="description" placeholder="description" cols="30" rows="10"> 
                                            </textarea>
                                            <label>Description</label> 
                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="input-group"> 
                                            <div class="input-group"> 
                                              <input type="file" name="image" class="form-control" value="{{$meal['image']}}"> 
                                              <label>Image</label> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>

                                <div class="row justify-content-center">
                                    <div class="col-12">
                                        <div class="row">

                                            @if($errors->has('category'))
                                            <div class="error bg-light text-danger">
                                                {{$errors->first('category')}}
                                            </div>
                                            @endif
                                            <div class="col-6">
                                                <div class="input-group">
                                                    <select class="form-select" name="category">
                                                        <option>{{$meal['catetory']}}</option>
                                                        <option>Fast Food</option>
                                                        <option>Traditional Food</option>
                                                        <option>Others</option>
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            @if($errors->has('price'))
                                            <div class="error bg-light text-danger">
                                                {{$errors->first('price')}}
                                            </div>
                                            @endif
                                            <div class="col-6">
                                                <div class="input-group"> 
                                                    <input type="number" name="price" placeholder="price" value="{{$meal['price']}}">
                                                    <label>Price</label> 
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="row justify-content-center">
                                    <div class="col-md-12"> 
                                        <input type="submit" value="Update" class="btn btn-warning placeicon"> 
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
            

        </div>
    </div>



<script>
$(document).ready(function () {

$('#sidebarCollapse').on('click', function () {
    $('#sidebar').toggleClass('active');
});

});
</script>

    @include('includes.scripts')
</body>
</html>