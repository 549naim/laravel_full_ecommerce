@include('admin.admincss')

<div class="container">
    <div class="row">
        <div class="col-3">
            <aside
                class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
                id="sidenav-main">

                <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link text-white " href="{{ url('/dashboard') }}">

                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">dashboard</i>
                                </div>

                                <span class="nav-link-text ms-1">Dashboard</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link text-white " href="{{ url('/categorypage') }}">

                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">table_view</i>
                                </div>

                                <span class="nav-link-text ms-1">Category</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link text-white " href="{{ url('/showallproducts') }}">

                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">receipt_long</i>
                                </div>

                                <span class="nav-link-text ms-1">Allproducts</span>
                            </a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link text-white " href="./virtual-reality.html">

                                <div
                                    class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">view_in_ar</i>
                                </div>

                                <span class="nav-link-text ms-1">Virtual Reality</span>
                            </a>
                        </li>





                    </ul>
                </div>



            </aside>
        </div>

        <div class="col-9 mt-3">

            <!doctype html>
            <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <!-- CSRF Token -->
                <meta name="csrf-token" content="{{ csrf_token() }}">

                <title>{{ config('app.name', 'Laravel') }}</title>

                <!-- Fonts -->
                <link rel="dns-prefetch" href="//fonts.gstatic.com">
                <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
                    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
                    crossorigin="anonymous">
                <!-- Scripts -->
                @vite(['resources/sass/app.scss', 'resources/js/app.js'])
            </head>

            <body>
                <div id="app">
                    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                        <div class="container">

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav me-auto">

                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                        @if (Route::has('login'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                            </li>
                                        @endif

                                        @if (Route::has('register'))
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                            </li>
                                        @endif
                                    @else
                                        <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                {{ Auth::user()->name }}
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <li><a class="dropdown-item" href="#">My Profile</a></li>
                                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                </form>

                                            </ul>
                                        </li>

                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>

                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>


                <div>
                    <div>

                        <h1> Insert Product</h1>

                        <form action="{{ url('/insert_allproduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Name</label>
                                <input type="text" name='name' class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Id</label>
                                <select name="cate_id" class="form-select" aria-label="Default select example">
                                    <option selected>Select a Category</option>
                                    @foreach ($category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" name='description' class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>

                            <div class="mb-3 form-check">
                                <input name="status" type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Status</label>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">small desc</label>
                                <input type="text" name='small_desc' class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">orginal price</label>
                                <input type="text" name='orginal_price' class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">selling price</label>
                                <input type="text" name='selling_price' class="form-control"
                                    id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Stock quantity</label>
                                <input type="text" name='quantity' class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div class="mb-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"> Product quantity</label>
                                <input type="text" name='p_q' class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">
                            </div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">tax</label>
                            <input type="text" name='tax' class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                    </div>


                    <br>
                    <div class="mb-3 form-check">
                        <input name="trending" type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">trending</label>
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Meta Description</label>
                        <input type="text" name='meta_desc' class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Meta Keywords</label>
                        <input type="text" name="meta_keywords" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Meta title</label>
                        <input type="text" name="meta_title" class="form-control" id="exampleInputPassword1">
                    </div>

                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="exampleInputPassword1">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>

                <style>
                    table {
                        font-family: arial, sans-serif;
                        border-collapse: collapse;
                        width: 100%;
                    }

                    td,
                    th {
                        border: 1px solid #dddddd;
                        text-align: left;
                        padding: 8px;
                    }

                    tr:nth-child(even) {
                        background-color: #dddddd;
                    }
                </style>
                </head>

                <body>

                    <h2>All Product Table</h2>

                    <table>
                      <tr>
                        <tr>
                            <th>ID</th>
                            <th>NAME</th>
                            <th>Category Name</th>
                            <th>DESCRIPTION</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                          </tr>
                        </thead>
                      </tr>
                      @foreach ($products as $product)
                      <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->description}}</td>
                        <td><img class="img-responsive" height="100" width="100"src="/product_image/{{$product->image}}" alt="image"></td>
                        <td><a href="{{url('edit_product/'.$product->id)}}" class="btn btn-primary">Edit</a>
                        <a href="{{url('delete_product/'.$product->id)}}" class="btn btn-danger">Delete</a></td>
                      </tr>
                          
                      @endforeach
                     
                    </table>



        </div>


        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        </html>


    </div>

</div>
</div>


@include('admin.scripts')
