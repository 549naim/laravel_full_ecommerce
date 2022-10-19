@include('admin.admincss')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                    crossorigin="anonymous">
<div class="container">


    <h1> Edit Product</h1>

    <form action="{{ url('/upload_allproduct',$product->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input value="{{$product->name}}" type="text" name='name' class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Category</label>
            <select  class="form-select" aria-label="Default select example">
                <option value="" >{{$product->category->name}}</option>
                
            </select>

        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <input value="{{$product->description}}" type="text" name='description' class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="mb-3 form-check">
            <input  {{$product->status=='1'?'checked':" "}} name="status" type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Status</label>
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">small desc</label>
            <input value="{{$product->small_desc}}" type="text" name='small_desc' class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">orginal price</label>
            <input value="{{$product->orginal_price}}" type="text" name='orginal_price' class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">selling price</label>
            <input value="{{$product->selling_price}}" type="text" name='selling_price' class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Stock quantity</label>
            <input value="{{$product->quantity}}" type="text" name='quantity' class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div class="mb-3">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product quantity</label>
            <input value="{{$product->p_q}}" type="text" name='p_q' class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">tax</label>
        <input value="{{$product->tax}}" type="text" name='tax' class="form-control" id="exampleInputEmail1"
            aria-describedby="emailHelp">



<br>
<div class="mb-3 form-check">
    <input {{$product->trending=='1'?'checked':" "}} name="trending" type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">trending</label>
</div>

<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Meta Description</label>
    <input value="{{$product->meta_desc}}" type="text" name='meta_desc' class="form-control" id="exampleInputEmail1"
        aria-describedby="emailHelp">
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
    <input value="{{$product->meta_keywords}}" type="text" name="meta_keywords" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Meta title</label>
    <input value="{{$product->meta_title}}" type="text" name="meta_title" class="form-control" id="exampleInputPassword1">
</div>

<div class="mb-3">
    <label for="formFile" class="form-label">old image</label>
    <img height="100" width="100"src="/product_image/{{$product->image}}">
  </div>
<div class="mb-3">
    <label for="formFile" class="form-label">new image</label>
    <input  name="image" class="form-control" type="file" id="formFile" >
  </div>

<button type="submit" class="btn btn-primary">Submit</button>
</form>

</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

@include('admin.scripts')