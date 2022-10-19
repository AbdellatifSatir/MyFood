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
    </style>

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

            @if(Session::has('success'))
            <div class="alert alert-success">
                {{Session::get('success')}}
            </div>
            @endif

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
                            <!--th scope="col">Updated</!--th-->
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($orders as $item)

                        <form action="{{url('/admin-dashboard/orders/update/'.$item['_id'])}}" method="POST">
                            @csrf
                            @method('PUT')

                        <tr class="rounded bg-white">

                            <td class="order-color">{{$item['_id']}}</td>

                            <!--td>1</!--td-->
                            <!--td>{{$item['created_at']}}</!--td-->

                            <td class="d-flex align-items-center"> 
                                <span class="ml-2">{{$item['ClientName']}}</span> 
                                <input type="hidden" name="ClientName" value="{{$item['ClientName']}}">
                            </td>
                            <td>{{$item['title']}}</td>
                            <input type="hidden" name="title" value="{{$item['title']}}">

                            <td>{{$item['note']}}</td>
                            <input type="hidden" name="note" value="{{$item['note']}}">
                            
                            <td>{{$item['quantity']}}</td>
                            <input type="hidden" name="quantity" value="{{$item['quantity']}}">

                            <td>{{$item['total']}}Dh</td>
                            <input type="hidden" name="total" value="{{$item['total']}}">

                            <td>{{$item['address']}}</td>
                            <input type="hidden" name="address" value="{{$item['address']}}">

                            <td>
                                <div class="dropdown">
                                    <select class="btn btn-warning text-light btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false" name="status"> 

                                        @if($item['status']=="Pending")
                                         <option class="dropdown-item text-light" value="{{$item['status']}}">{{$item['status']}}</option>
                                         <option class="dropdown-item text-light" value="Delivered">Delivered</option>
                                        @elseif($item['status']=="Delivered")
                                         <option class="dropdown-item text-light" value="{{$item['status']}}">{{$item['status']}}</option>
                                         <option class="dropdown-item text-light" value="Pending">Pending</option>
                                        @endif
                                        
                                    </select>
                                </div>
                            </td>
                            <td>
                                <input type="submit" class="btn btn-primary" value="Confirm" >
                            </td>

                        </tr>
                        
                        </form>
                        @endforeach
                        
                    </tbody>

                </table>
            </div>


        </div>
    </div>





    @include('includes.scripts')
</body>
</html>