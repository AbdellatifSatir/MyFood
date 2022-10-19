<?php
$user=DB::table('users')->where('_id',Session::get('loginId'))->first();
$meals= DB::table('meals')->get();
?>
<!DOCTYPE html>
<html>

<head>
  @include('includes.header')
  <title> MyFood </title>
</head>


<body>

  <div class="hero_area">
    <div class="bg-box">
      <img src="assets/images/hero-bg.jpg" alt="">
      <!--img src="assets/images/bg1.jpg" alt=""-->
    </div>
    
    @include('includes.navbar')

    <!-- slider section -->
    <section class="slider_section ">
      <div id="customCarousel1" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1> Fast Food Restaurant </h1>

                    <div class="btn-box">
                      @if(Session::has('loginId'))
                       @if($user['type']=="Client")
                        <a href="/dashboard/menu"> Dashboard</a>
                       @elseif($user['type']=='Admin')
                        <a href="/admin-dashboard"> Dashboard</a>
                       @endif
                      @else
                        <a href="/autentication" class="btn1" style="text-decoration: none"> Order Now </a>
                      @endif
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item ">
            <div class="container ">
              <div class="row">
                <div class="col-md-7 col-lg-6 ">
                  <div class="detail-box">
                    <h1> Fast Food Restaurant </h1>

                    <div class="btn-box">
                      <a href="" class="btn1">
                        Order Now
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="container">
          <ol class="carousel-indicators">
            <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
            <li data-target="#customCarousel1" data-slide-to="1"></li>
          </ol>
        </div>

      </div>

    </section>
    <!-- end slider section -->
  </div>



  <!-- food section -->
  <section class="food_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h1>
          Our Menu
        </h1>
      </div>

      <ul class="filters_menu">
        <li data-filter=".allfood">All</li>
        <li data-filter=".fastfood">Fast Food</li>
        <li data-filter=".traditionalfood">Traditional Food</li>
        <li data-filter=".others">Others</li>
      </ul>

      @if(Session::has('loginId') && $user['type']=='Admin')
      <div class="filters-content">
        <div class="row grid">
            
          <!--All-->
          @foreach ($meals as $item)
          <form action="" method="">
            @csrf
            <div class="col-sm-6 col-lg-4 all allfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endforeach

          <!--Fast Food-->
          @foreach ($meals as $item)
          @if($item['category'] == "Fast Food")
            <form action="" method="">
            @csrf
            <div class="col-sm-6 col-lg-4 all fastfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

          <!--Traditional Food-->
          @foreach ($meals as $item)
          @if($item['category'] == "Traditional Food")
            <form action="" method="">
            @csrf
            <div class="col-sm-6 col-lg-4 all traditionalfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

          <!--Others-->
          @foreach ($meals as $item)
          @if($item['category'] == "Others")
            <form action="" method="">
            @csrf
            <div class="col-sm-6 col-lg-4 all others">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

        </div>
      </div>
      @endif

      
      
      <!---- For Client ---->
      
       @if(Session::has('status'))
       <div class="alert alert-warning">
           {{Session::get('status')}}
       </div>
       @endif

      @if(Session::has('loginId') && $user['type']=='Client')
      <div class="filters-content">
        <div class="row grid">
            
          <!--All-->
          @foreach ($meals as $item)
          <form action="{{Route('AddToCart')}}" method="POST">
            @csrf
            <div class="col-sm-6 col-lg-4 all allfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endforeach

          <!--Fast Food-->
          @foreach ($meals as $item)
          @if($item['category'] == "Fast Food")
            <form action="{{Route('AddToCart')}}" method="POST">
            @csrf
            <div class="col-sm-6 col-lg-4 all fastfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

          <!--Traditional Food-->
          @foreach ($meals as $item)
          @if($item['category'] == "Traditional Food")
            <form action="{{Route('AddToCart')}}" method="POST">
            @csrf
            <div class="col-sm-6 col-lg-4 all traditionalfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

          <!--Others-->
          @foreach ($meals as $item)
          @if($item['category'] == "Others")
            <form action="{{Route('AddToCart')}}" method="POST">
            @csrf
            <div class="col-sm-6 col-lg-4 all others">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

        </div>
      </div>
      @endif


      <!--- Dont Has LoginId --->

      @if(!Session::has('loginId'))
      <div class="filters-content">
        <div class="row grid">
            
          <!--All-->
          @foreach ($meals as $item)
          <form action="{{url('/login')}}" method="GET">
            @csrf
            <div class="col-sm-6 col-lg-4 all allfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endforeach

          <!--Fast Food-->
          @foreach ($meals as $item)
          @if($item['category'] == "Fast Food")
            <form action="{{url('/login')}}" method="GET">
            @csrf
            <div class="col-sm-6 col-lg-4 all fastfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

          <!--Traditional Food-->
          @foreach ($meals as $item)
          @if($item['category'] == "Traditional Food")
            <form action="{{url('/login')}}" method="GET">
            @csrf
            <div class="col-sm-6 col-lg-4 all traditionalfood">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

          <!--Others-->
          @foreach ($meals as $item)
          @if($item['category'] == "Others")
            <form action="{{url('/login')}}" method="GET">
            @csrf
            <div class="col-sm-6 col-lg-4 all others">
              <div class="box">
                <div>
                  <div class="img-box">
                    <img src="{{asset('uploads/images/'.$item['image'])}}" alt="">
                  </div>
                  <div class="detail-box">
                    <input type="hidden" name="ClientId" value="{{session()->get('loginId')}}">
                    <input type="hidden" name="mealId" value="{{$item['_id']}}">
                    <h5> {{$item['title']}} </h5>
                    <input type="hidden" name="title" value="{{$item['title']}}">
                    <p>{{$item['category']}}</p>
                    <p> {{$item['description']}}</p>
                    <input type="hidden" name="description" value="{{$item['description']}}">
                    <div class="options">
                      <h6> {{$item['price']}} DH </h6>
                      <input type="hidden" name="price" value="{{$item['price']}}">
                      <button type="submit">
                        Add to Cart<i class="fa-solid fa-cart-shopping text-warning" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
          @endif
          @endforeach

        </div>
      </div>
      @endif


      <div class="btn-box">
        <a href=""> View More </a>
      </div>

    </div>
  </section>
  <!-- end food section -->


  <!-- client section -->
  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center psudo_white_primary mb_45">
        <h2>  What Says Our Customers </h2>
      </div>
      <div class="carousel-wrap row ">
        <div class="owl-carousel client_owl-carousel">

          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6> Moana Michell </h6>
                <p> magna aliqua</p>
              </div>
              <div class="img-box">
                <img src="assets/images/client1.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>
          <div class="item">
            <div class="box">
              <div class="detail-box">
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                </p>
                <h6> Mike Hamell </h6>
                <p> magna aliqua </p>
              </div>
              <div class="img-box">
                <img src="assets/images/client2.jpg" alt="" class="box-img">
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </section>
  <!-- end client section -->

  <!-- footer section -->
  @include('includes.footer')

  @include('includes.scripts')
</body>
</html>