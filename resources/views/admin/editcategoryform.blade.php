<div class="container">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<h2> Edit product Category</h2>
<form action="{{url('/update_category',$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Name</label>
      <input value={{$category->name}} type="text" name='name' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Slug</label>
      <input value={{$category->name}} type="text" name='slug' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Description</label>
      <input value={{$category->name}} type="text" name='description' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 form-check">
        <input {{$category->status=='1'?'checked':" "}} name="status" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Status</label>
      </div>
      <div class="mb-3 form-check">
        <input {{$category->populer=='1'?'checked':" "}} name="populer" type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Populer</label>
      </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Meta Title</label>
      <input value={{$category->name}} type="text" name='meta_title' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Meta Description</label>
      <input value={{$category->name}} type="text" name='meta_descrip' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
      <input value={{$category->name}} type="text" name="meta_keywords" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">old image</label>
        <img height="100" width="100"src="/category_image/{{$category->image}}">
      </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">new image</label>
        <input value="{{$category->image}}" name="image" class="form-control" type="file" id="formFile" >
      </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</div>