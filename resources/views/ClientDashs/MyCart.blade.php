<?php
$user= 'App\Models\User'::where('_id','=',Session::get('loginId'))->first();
?>
<!DOCTYPE html>
<html>

<head>
    @include('includes.header')
    <title>Dashboard</title>
    <!--style-->
    @include('includes.sidebarCSS')
    <style>
body { background-color: #eeeeee }

.footer-background { background-color: rgb(204, 199, 199) }

@media(max-width:991px) {
    #heading { padding-left: 50px }

    #prc {
        margin-left: 70px;
        padding-left: 110px
    }

    #quantity { padding-left: 48px }

    #produc { padding-left: 40px }

    #total { padding-left: 54px }
}

@media(max-width:767px) {
    .mobile {  font-size: 10px }

    h5 { font-size: 14px }

    h6 { font-size: 9px  }

    #mobile-font { font-size: 11px }

    #prc {
        font-weight: 700;
        margin-left: -45px;
        padding-left: 105px
    }

    #quantity {
        font-weight: 700;
        padding-left: 6px
    }

    #produc {
        font-weight: 700;
        padding-left: 0px
    }

    #total {
        font-weight: 700;
        padding-left: 9px
    }

    #image {
        width: 60px;
        height: 60px
    }

    .col {  width: 100% }

    #zero-pad {
        padding: 2%;
        margin-left: 10px
    }

    #footer-font {  font-size: 12px  }

    #heading {  padding-top: 15px  }
}
    </style>
     
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
                <ul class="list-unstyled components">
                    <p><i class="fa fa-user" aria-hidden="true"></i> {{$user->firstname.' '.$user->lastname}}</p>
                    <li> <a href="/dashboard/mycart" class="active">My Cart</a> </li>
                    <li> <a href="/dashboard/mycommands">My Commands</a> </li>
                </ul>
            </div>

        </nav>


        <!-- Page Content  -->
        <div id="content">


            <div class="d-flex">
                <div class="pt-1"> <h4>My Cart</h4> </div>
            </div>

            @if(Session::has('status'))
                <div class="alert alert-warning">
                    {{Session::get('status')}}
                </div>
            @endif

            @foreach ($cart as $item)
            <form action="{{Route('OdrerNow')}}" method="POST">
                @csrf
                
                <div class="container bg-white rounded-top mt-5" id="zero-pad">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-12 pt-3">

                            

                            <div class="d-flex flex-row justify-content-between align-items-center pt-lg-4 pt-2 pb-3 border-bottom mobile">

                                <div class="d-flex flex-row align-items-center">
                                    <div class="d-flex flex-column pl-md-3 pl-1">
                                        <div>
                                            <!--h6>{{$item['_id']}}</h6-->
                                            <!--h6>{{$item['mealId']}}</h6-->
                                            <label for="">Title</label><br>
                                            <h6><strong>{{$item['title']}}</strong></h6>
                                            <input type="hidden" name="cartId" value="{{$item['_id']}}">
                                            <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                                            <input type="hidden" name="ClientName" value="{{$user['firstname'].' '.$user['lastname']}}">
                                            <input type="hidden" name="title" value="{{$item['title']}}">

                                        </div>
                                    </div>
                                </div>

                                <div class="pl-md-0 pl-1">
                                    <label for="">Price :</label><br>
                                    <b>{{$item['price']}} Dh</b>
                                </div>

                                <div class="pl-md-0 pl-2 col-xs-2"> 
                                    <label for="">Quantity</label>
                                    <input type="number" min="1" name="quantity" id="" class="form-control" value="1">
                                    <input type="hidden" name="total" value="{{$item['price']}}">

                                    <input type="hidden" name="status" value="Pending">
                                </div>

                                <div class="pl-md-0 pl-3"> 
                                    <label for="">Delivery adress</label>
                                    <input type="text" name="address" id="" class="form-control" value="{{$user['adress']}}">
                                    <input type="text" name="note" id="" class="form-control" placeholder="Add Note">
                                </div>

                                <div class="close">
                                    <a href="/dashboard/mycart/cancel/{{$item['_id']}}" 
                                    onclick="return confirm('are you sure?')">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>
    
                <div class="container bg-light rounded-bottom py-4" id="zero-pad">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-10 col-12">
                            <div class="d-flex justify-content-between align-items-center">
                                <div> 
                                    <a href="/dashboard/menu">Add More</a>
                                </div>
                                <div> </div>
                                <div> 
                                    <button type="submit" class="btn btn-sm bg-dark text-white px-lg-5 px-3">
                                        Order Now
                                    </button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </form>
            @endforeach



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