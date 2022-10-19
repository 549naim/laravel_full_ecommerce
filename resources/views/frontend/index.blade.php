


@include('layouts.front')

@include('frontend.slider')
<br>
 <h1 style="margin-left: 33%;" >Featured Product</h1>
<div class="owl-carousel owl-theme">
    @foreach ($product as $product)
    <div class="card" style="width: 18rem;">
        <img src="/product_image/{{$product->image}}" height="200"  class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">{{$product->name}}</h5>
          <p class="card-text">{{ $product->description   }}</p>
          <a href="" class="btn btn-primary">{{$product->selling_price}}</a>
        </div>
      </div>
    @endforeach
    
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


