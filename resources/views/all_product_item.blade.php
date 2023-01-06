@include('layouts.front')
<br>
<style>
    a{
      text-decoration: none;
      color: black;
    }
</style>    
<div class="container">
    <div class="row">
        @foreach ($data as $product )
         
        <div class="col-3 ms-5">
            <a href="{{url('view_product_details/'.$product->id.'/'.$product->name)}}">
        <div class="card" style="width: 18rem;">
            <img src="/product_image/{{$product->image}}" height="200" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->name}}</h5>
              <p class="card-text">{{$product->small_desc}}</p>
              <p class="btn btn-success rounded-pill">price : {{$product->selling_price}}</p>
              
            </div>
        </a>
        </div>
    </div>
    
        @endforeach
    </div>
</div>   
