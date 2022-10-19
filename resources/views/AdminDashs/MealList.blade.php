<!DOCTYPE html>
<html>

<head>
    @include('includes.header')
    <title>Admin Dashboard</title>
    <!--style-->
    @include('includes.sidebarCSS')

</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
          <img src="{{ asset('assets/images/hero-bg.jpg') }}" alt="">
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
            

<!-- food section -->
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter=".allfood">All</li>
        <li data-filter=".fastfood">Fast Food</li>
        <li data-filter=".traditionalfood">Traditional Food</li>
        <li data-filter=".others">Others</li>
      </ul>

      <div class="filters-content">
        <div class="row grid">

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

            @if(Session::has('status'))
            <div class="alert alert-warning">
                {{Session::get('status')}}
            </div>
            @endif

            <!--All-->
            @foreach ($meals as $item)
            <div class="col-sm-6 col-lg-4 all allfood">
                <div class="box">
                  <div>
                    <div class="img-box">
                      <img src="{{ asset( 'uploads/images/'.$item['image'] ) }}" width="200" height="200">
                    </div>
                    <div class="detail-box">
                      <h5> {{ $item['title'] }} </h5> 
                      <p>{{$item['category']}}</p>
                      <p> {{ $item['description'] }}  </p>
                      <div class="options">
                        <h6>  {{ $item['price'] }} DH </h6>
                      </div>
                      <div class="options">
                        <a href="/admin-dashboard/meal-list/delete/{{$item['_id']}}" 
                          onclick="return confirm('are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>

                        <a href="{{url('/admin-dashboard/meal-list/'.$item['_id'])}}"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
            @endforeach


        </div>
      </div>
    <!-- end food section -->





    @include('includes.scripts')
</body>
</html>