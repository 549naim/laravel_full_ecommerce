<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    @include('layouts.front')
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
        <div class="">
            <div class="row">
                <div class="col-10">
                    <h2>Cart Table</h2>

                    <table class="table1">
                        <tr>
                        <tr>

                            <th>NAME</th>
                            <th>Price</th>
                            <th>IMAGE</th>
                            <th>ACTION</th>
                            <th>Quantity</th>
                        </tr>
                        </thead>
                        </tr>

                        @php $total = 0; @endphp
                        @foreach ($cart_data as $cart_data)
                            <tr class="product_data">
                                <input type="hidden" class="p_id " value="{{ $cart_data->id }}">

                                <td>{{ $cart_data->cartproduct->name }}</td>
                                <td>{{ $cart_data->cartproduct->selling_price * $cart_data->prod_qty }}</td>
                                <td><img class="img-responsive" height="100"
                                        width="100"src="/product_image/{{ $cart_data->cartproduct->image }}"
                                        alt="image"></td>
                                <td>
                                    <a href="" class="btn btn-danger delete_prod">Delete</a>
                                </td>
                                <td>
                                    @if ($cart_data->cartproduct->quantity >= $cart_data->prod_qty)
                                        <div class="i-1">

                                            <table>
                                                <tr>
                                                    <th><button
                                                            class="input-group-text changequantity decrement-btn">-</button>
                                                    </th>
                                                    <th><input id="q_f" type="text"
                                                            class='form-control text-center p_quantity prod_qty '
                                                            value="{{ $cart_data->prod_qty }}"></th>
                                                    <th> <button
                                                            class="input-group-text changequantity increment-btn">+</button>
                                                    </th>

                                                </tr>
                                                <span> Max quantity : {{ $cart_data->cartproduct->quantity }} </span>
                                            </table>
                                            @php $total += $cart_data->cartproduct->selling_price * $cart_data->prod_qty;
                                            @endphp

                                        </div>
                                    @else
                                        <h6>Qunatity Not Available</h6>
                                    @endif

                                </td>

                            </tr>
                        @endforeach

                    </table>

                    <br>

                </div>
                <div class="col-2 my-5">
                    <div class=" p-3 text-center">
                        <h4> Total : {{ $total }}</h4>
                    </div>
                    <hr>
                    <div class=" bg-secondary p-3 text-center">
                        <a href="{{ url('/cheakout') }}" class="btn btn-primary">Cheakout</a>
                    </div>
                </div>
            </div>


        </div>






        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });







            $(document).ready(function() {
                $('.increment-btn').click(function(e) {
                    e.preventDefault();

                    var inc_value = $(this).closest('.product_data').find('.p_quantity').val();
                    var value = parseInt(inc_value, 10);
                    value = isNaN(value) ? 0 : value;
                    if (value < 10) {
                        value++;
                        $(this).closest('.product_data').find('.p_quantity').val(value);
                    }

                });
            });


            $(document).ready(function() {
                $('.decrement-btn').click(function(e) {
                    e.preventDefault();
                    // var inc_value = $('.p_quantity').val();
                    var dec_value = $(this).closest('.product_data').find('.p_quantity').val();
                    var value = parseInt(dec_value, 0);
                    value = isNaN(value) ? 0 : value;

                    if (value > 0) {
                        value--;
                        $(this).closest('.product_data').find('.p_quantity').val(value);
                    }

                });
            });
            $(document).ready(function() {
                $('.delete_prod').click(function(e) {
                    e.preventDefault();
                    var product_id = $(this).closest('.product_data').find('.p_id').val();
                    console.log(product_id);

                    $.ajax({
                        type: "post",
                        url: "/delete_from_cart",
                        data: {
                            'id': product_id,
                        },

                        success: function(response) {

                            swal(response.status);
                            window.location.reload();
                        }
                    });
                });
            });

            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var cart_id = $(this).closest('.product_data').find('.p_id').val();
                var product_qty = $(this).closest('.product_data').find('.prod_qty').val();
                product_qty = parseInt(product_qty) + 1
                // console.log(cart_id);
                // console.log(product_qty);
                $.ajax({
                    type: "POST",
                    url: "/edit_quantity",
                    data: {
                        'cart_id': cart_id,
                        'product_qty': product_qty,
                    },

                    success: function(response) {
                        window.location.reload();
                    }
                });

            });

            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var cart_id = $(this).closest('.product_data').find('.p_id').val();
                var product_qty = $(this).closest('.product_data').find('.prod_qty').val();
                product_qty = parseInt(product_qty) - 1
                // console.log(cart_id);
                // console.log(product_qty);
                $.ajax({
                    type: "POST",
                    url: "/edit_quantity",
                    data: {
                        'cart_id': cart_id,
                        'product_qty': product_qty,
                    },

                    success: function(response) {
                        window.location.reload();
                    }
                });

            });
        </script>



    </body>

</html>
