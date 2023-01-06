@include('admin.admincss')
<style>
    .cus_d {
        border: 1px solid black;
    }

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
<div class="container">
  <div class="row">
    <div class="col-3">
      <aside
      class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
      id="sidenav-main"> 
  
      <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
  
          <li class="nav-item">
            <a class="nav-link text-white " href="{{url('/dashboard')}}">
  
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">dashboard</i>
              </div>
  
              <span class="nav-link-text ms-1">Dashboard</span>
            </a>
          </li>
  
  
          <li class="nav-item">
            <a class="nav-link text-white " href="{{url('/categorypage')}}">
  
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
  
              <span  class="nav-link-text ms-1">Category</span>
            </a>
          </li>
  
  
          <li class="nav-item">
            <a class="nav-link text-white "  href="{{url('/showallproducts')}}">
  
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">receipt_long</i>
              </div>
  
              <span class="nav-link-text ms-1">Allproducts</span>
            </a>
          </li>
  
  
          <li class="nav-item">
            <a class="nav-link text-white "  href="{{url('/all_orders')}}">
  
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
              </div>
  
              <span class="nav-link-text ms-1">Orders</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link text-white "  href="{{url('/all_orders_history')}}">
  
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
              </div>
  
              <span class="nav-link-text ms-1">Orders Hostoty</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white "  href="{{url('/all_users')}}">
  
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
              </div>
  
              <span class="nav-link-text ms-1">Users</span>
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
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      {{ Auth::user()->name }}
                                  </a>
                                  <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="#">My Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                       {{ __('Logout') }}
                                   </a></li>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
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
      </body>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </html>
      <div>
        <div class="container">
            <h2>Order History details</h2>
            <div class="row">
                <div class="col-5">
                    <h2>Customer Details</h2>
                    <h6 class="cus_d  p-2">Id : {{ $user->id }}</h6>
                    <h6 class="cus_d  p-2">Name : {{ $user->name }}</h6>
                    <h6 class="cus_d  p-2">Email : {{ $user->email }}</h6>
                    <h6 class="cus_d  p-2">Phone Number : {{ $user->phone_number }}</h6>
                    <h6 class="cus_d  p-2">Address : {{ $user->address }}</h6>
                    <h6 class="cus_d  p-2">City : {{ $user->city }}</h6>
                    <h6 class="cus_d  p-2">State : {{ $user->state }}</h6>
                    <h6 class="cus_d  p-2">Country : {{ $user->country }}</h6>
                    <h6 class="cus_d  p-2">Postal Code : {{ $user->postalcode }}</h6>
                    @if($user->role_as == '0')
                    <h6 class="cus_d  p-2">Role : User</h6>
                    @else
                    <h6 class="cus_d  p-2">Role : Admin</h6>
                    @endif                    
                    <h6 class="cus_d  p-2">Memeber at : {{ $user->created_at }}</h6>
                    <h6 class="cus_d  p-2">Last Update : {{ $user->updated_at }}</h6>
                                      
                </div>
                <div class="col-5">
                    <h2>All Orders</h2>
                    <table>
                        <tr>
                        <tr>
                            <th>Order Id</th>  
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Order Date</th>
                            <th>Order Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        </tr>
                        @foreach ($user->userorder as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->traking_num }}</td>
                                <td>{{ $item->total }}</td>
                                <td>{{ $item->created_at }}</td>
                                @if($item->status == '0')
                                <td class="badge bg-warning m-3" >Pending</td>
                                @else
                                <td class="badge bg-success text-dark m-3">Completed</td>
                                @endif
                                <td ><a href="{{ url('user_order_details_from_admin/'.$item->id) }}" class="btn btn-primary">Details </a>
                                </td>
    
    
                            </tr>
                        @endforeach
    
                    </table>
                    
                    
                </div>
               
    
            </div>
        </div>
      </div>

    </div>
    
  </div>
</div>


@include('admin.scripts')