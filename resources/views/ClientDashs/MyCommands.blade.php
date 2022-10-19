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
         @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');

body {
    background-color: #eee;
    font-family: 'Roboto', sans-serif
}

.main {
    border-collapse: separate !important;
    border-spacing: 0 11px !important
}

tr {
    border: 1px solid #eee
}

.head th {
    font-weight: 500
}

tr:nth-child(3) {
    border: solid thin
}

.form-check-input:focus {
    border-color: #8bbafe;
    outline: 0;
    box-shadow: none
}

.btn {
    height: 27px;
    line-height: 11px;
    color: #fff
}

.form-check-input {
    width: 1.15em;
    height: 1.15em;
    margin-top: 3px
}

.btn:focus {
    color: #fff;
    box-shadow: none !important
}

.order-color {
    color: blue
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
                    <li> <a href="/dashboard/mycart">My Cart</a> </li>
                    <li> <a href="/dashboard/mycommands">My Commands</a> </li>
                </ul>
            </div>

        </nav>

        

        <!-- Page Content  -->
        <div id="content">


            <div class="container mt-5">
                <table class="table table-borderless main">

                    <thead>
                        <tr class="head">
                            <th scope="col">Order ID</th>
                            <!--th scope="col">Created</!--th-->
                            <th scope="col">Customer</th>
                            <th scope="col">Meal</th>
                            <th scope="col">Note</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th scope="col">Address</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            <!--th scope="col">Updated</!--th-->
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($mycmd as $item)
                        <form action="{{url('/dashboard/mycommands/update/'.$item['_id'])}}" method="POST">
                         @csrf
                         @method('PUT')

                         <tr class="rounded bg-white">

                            <td class="order-color">{{$item['_id']}}</td>
                            <!--td>{{$item['created_at']}}</!--td-->

                            <td class="d-flex align-items-center"> 
                                <span class="ml-2">{{$item['ClientName']}}</span> 
                                <input type="hidden" name="ClientName" value="{{$item['ClientName']}}">
                            </td>

                            <td>{{$item['title']}}</td>
                            <input type="hidden" name="title" value="{{$item['title']}}">

                            <td>
                                @if($item['status']=='Pending')
                                 <input type="text" class="form-control" name="note" value="{{$item['note']}}">
                                @else
                                <input type="text" class="form-control" name="note" value="{{$item['note']}}" readonly>
                                @endif
                            </td>

                            <td><input type="number" min="1" class="form-control" name="quantity" 
                                value="{{$item['quantity']}}" readonly>
                            </td>

                            <td>{{$item['total']}}Dh</td>
                            <input type="hidden" name="total" value="{{$item['quantity']*$item['total']}}">

                            <td>
                                @if($item['status']=='Pending')
                                 <input type="text" class="form-control" name="address" value="{{$item['address']}}">
                                @else
                                <input type="text" class="form-control" name="address" value="{{$item['address']}}" readonly>
                                @endif
                            </td>

                            <td>
                                <div class="dropdown">
                                    @if($item['status']=='Pending')

                                    <div class="dropdown"> 
                                        <button class="btn btn-warning text-light btn-sm-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"> {{$item['status']}} 
                                        </button>
                                        <input type="hidden" name="status" value="{{$item['status']}}">
                                    </div>

                                    @elseif($item['status']=='Delivered')
                                    <div class="dropdown"> 
                                        <button class="btn btn-success btn-sm-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false"> {{$item['status']}} 
                                        </button>
                                        <input type="hidden" name="status" value="{{$item['status']}}">
                                    </div>
                                    
                                    @endif
                                </div>
                            </td>

                            <td>
                                @if($item['status']=='Pending')
                                 <input type="submit" class="btn btn-primary" value="Place Order" >
                                @elseif($item['status']=='Pending' && isset($item['_id']))
                                 <input type="text" class="btn btn-primary" value="none" >
                                @endif
                            </td>

                            <td>
                                @if($item['status']=='Pending')
                                <div class="close">
                                    <a href="/dashboard/mycommands/cancel/{{$item['_id']}}" 
                                    onclick="return confirm('are you sure?')">
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                    </a>
                                </div>
                                @endif
                            </td>

                         </tr>
                        
                        </form>
                        @endforeach
                    </tbody>

                </table>
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