<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('layouts.front')

    <div class="container">
        <form action="{{url('/place_order')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row">
                <div class="col-7">
                    <h5 class="p-3">Basic details</h5>
                    <hr>


                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label"> Name</label>
                            <input value="{{Auth::user()->name}}" name='name' type="text" class="form-control" id="exampleInputEmail1" placeholder=" Name">
                        </div>
                        <br>
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Address </label>
                            <input value="{{Auth::user()->address}}" name='address' type="text" class="form-control" id="exampleInputEmail1" placeholder="Address ">
                        </div>
                        <br>

                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input value="{{Auth::user()->email}}" name='email' type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <br>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label"> Phone Number</label>
                            <input value="{{Auth::user()->p_number}}" name='phone_number' type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Phone Number">
                        </div>
                        <br>
                    </div>



                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">City</label>
                            <input value="{{Auth::user()->city}}" name='city' type="text" class="form-control" id="exampleInputEmail1" placeholder="City">
                        </div>
                        <br>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">State</label>
                            <input value="{{Auth::user()->state}}" name='state' type="text" class="form-control" id="exampleInputEmail1" placeholder="State">
                        </div>
                        <br>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Country</label>
                            <input value="{{Auth::user()->country}}" name='country' type="text" class="form-control" id="exampleInputEmail1" placeholder="Country">
                        </div>
                        <br>

                        <div class="mb-3 col-6">
                            <label for="exampleInputEmail1" class="form-label">Postal Code</label>
                            <input value="{{Auth::user()->postalcode}}" name='postalcode' type="text" class="form-control" id="exampleInputEmail1"
                                placeholder="Postal Code">
                        </div>
                        <br>
                    </div>


                </div>
                <div class="col-5">
                    <h5 class="p-3">Order details</h5>
                    <hr>
                    <style>
                        .table1 {
                            font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }

                        td,
                        th {
                            border: 1px solid #dddddd;
                            text-align: center;
                            padding: 8px;
                        }

                        tr:nth-child(even) {
                            background-color: #dddddd;
                        }

                        .i-1 {
                            width: 170px;
                        }

                        .qty {
                            text-align: center;
                        }
                    </style>
                    </head>

                    <body>

                        <h2>Cart Table</h2>

                        <table class="table1">
                            <tr>
                            <tr>
                                <th>NAME</th>
                                <th>Price</th>
                                <th>IMAGE</th>
                                <th>Quantity</th>
                            </tr>
                            </thead>
                            </tr>

                            @php $total = 0; @endphp
                            @foreach ($cart_data as $cart_data)
                                {{-- @if ($cart_data->cartproduct->quantity >= $cart_data->prod_qty) --}}
                                <tr class="product_data">
                                    <td>{{ $cart_data->cartproduct->name }}</td>
                                    <td>{{ $cart_data->cartproduct->selling_price * $cart_data->prod_qty }}</td>
                                    <td><img class="img-responsive" height="30"
                                            width="30"src="/product_image/{{ $cart_data->cartproduct->image }}"
                                            alt="image"></td>
                                    <td>{{ $cart_data->prod_qty }}</td>

                                </tr>

                                @php $total += $cart_data->cartproduct->selling_price * $cart_data->prod_qty;
                                @endphp

                                {{-- @endif --}}
                            @endforeach

                        </table>
                        <div class=" bg-secondary p-3 ">
                            <h4> Total : {{ $total }}</h4>
                        </div>

                        <div class="container">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary float-end m-3">Place Order | COD</button>
                                </div>
                                
                            </div>
                        </div>

                       
                        <div class="col-6">
                            <button type="button" class="btn btn-warning float-end m-3 razorpayButton "><a href="{{url('/payment_go')}}">Pay Now</a></button>
                        </div>
                       
                </div>
            </div>
        </form>
    </div>

</body>



    


</html>
