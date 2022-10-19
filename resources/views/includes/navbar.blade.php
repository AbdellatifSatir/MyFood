@php 
    $user= 'App\Models\User'::where('_id','=',Session::get('loginId'))->first(); 
@endphp
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container bg-dark ">

          <a class="navbar-brand" href="/">
            <span> MyFood </span>
          </a>
          
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav  mx-auto ">

              <li class="nav-item"> <a class="nav-link" href="/">Home </a> </li>
              <li class="nav-item"> <a class="nav-link" href="/about">About</a> </li>

              @if(Session::has('loginId') && $user->type=='Client')
               <li class="nav-item"> <a class="nav-link" href="/dashboard/menu">Menu </a> </li>
              @elseif(Session::has('loginId') && $user->type=='Admin')
               <li class="nav-item"> <a class="nav-link" href="/admin-dashboard/menu">Menu </a> </li>
              @endif

            </ul>

            <div class="user_option">

              <a href="" class="user_link"> <i class="fa fa-user" aria-hidden="true"></i> </a>

              @if(Session::has('loginId') && $user->type=='Client')
              <a href="/dashboard/mycart" class="user_link">
                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                <sup >
                  ( {{DB::table('carts')->where('ClientId','=',Session::get('loginId'))->count();}} )
                </sup>
              </a>

              <a href="/dashboard/mycommands" class="user_link"> 
                <i class="fa fa-cutlery" aria-hidden="true"></i>
                <sup>
                  ( {{DB::table('commandes')->where('ClientId',Session::get('loginId'))
                  ->where('status','Pending')->count();}} )
                </sup>
              </a>
              @endif

              @if(Session::has('loginId') && $user->type=='Admin')
                <a href="/admin-dashboard/orders" class="user_link"><i class="fa fa-cutlery" aria-hidden="true"></i></a>
              @endif

              @if(Session::has('loginId'))
               <a href="{{Route('Logout')}}" class="order_online"> Logout </a>
              @else
               <a href="/autentication" class="order_online"> Login </a>
              @endif

            </div>

            
          </div>

        </nav>
      </div>
    </header>
    <!-- end header section -->