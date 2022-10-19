<?php
$meals= DB::table('meals')->get();
?>
<!DOCTYPE html>
<html>

<head>
  @include('includes.header')
  <title> Feane </title>
</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="{{asset('assets/images/hero-bg.jpg')}}" alt="">
    </div>
    
    @include('includes.navbar')
  </div>

  <!-- food section -->
  <section class="food_section layout_padding-bottom">
    <div class="container">

      <div class="heading_container heading_center">
        <h2>
          Our Menu
        </h2>
      </div>

      <ul class="filters_menu">
        <li data-filter=".allfood">All</li>
        <li data-filter=".fastfood">Fast Food</li>
        <li data-filter=".traditionalfood">Traditional Food</li>
        <li data-filter=".others">Others</li>
      </ul>

        @if(Session::has('status'))
            <div class="alert alert-warning">
                {{Session::get('status')}}
            </div>
        @endif

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

      <div class="btn-box">
        <a href="">  View More </a>
      </div>

    </div>
  </section>
  <!-- end food section -->


  <!-- footer section -->
  @include('includes.footer')


@include('includes.scripts')
</body>
</html>