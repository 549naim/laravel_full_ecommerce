


@include('layouts.front')

@include('frontend.slider')
<br>
<style>
    a{
      text-decoration: none;
      color: black;
    }
  </style>
  <br>
   <h1 style="margin-left: 33%;" >Featured Category</h1>
   
  <div class="ms-3">
    <div class="owl-carousel owl-theme">
      @foreach ($category as $category)
      <a  href="{{url('view_category_product/'.$category->id)}}">
      <div   class="card " style="width: 18rem;">
          <img src="/category_image/{{$category->image}}" height="200"  class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$category->name}}</h5>
            <p class="card-text">{{ $category->description   }}</p>
           
          </div>
        </div>
      </a>
      @endforeach
      
  </div>
  </div>
  
  
  
  <br>
   <h1 style="margin-left: 33%;" >Trending Category</h1>
   <div class="ms-3">
    <div class="owl-carousel owl-theme">
      @foreach ($trending_category as $category)
      <a href="{{url('view_category_product/'.$category->id)}}">
      <div class="card" style="width: 18rem;">
          <img src="/category_image/{{$category->image}}" height="200"  class="card-img-top">
          <div class="card-body">
            <h5 class="card-title">{{$category->name}}</h5>
            <p class="card-text">{{ $category->description   }}</p>
           
          </div>
        </div>
      </a>
      @endforeach
      
  </div>
   </div>
  
   
   <script>
     $('.owl-carousel').owlCarousel({
      loop:true,
      margin:10,
      nav:true,
      dots:false,
      responsive:{
          0:{
              items:1
          },
          600:{
              items:3
          },
          1000:{
              items:4
          }
      }
  })
   </script>
  

