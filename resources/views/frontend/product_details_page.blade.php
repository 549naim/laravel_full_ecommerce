<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @include('layouts.front')
    <br>
    <style>
        a {
            text-decoration: none;
            color: black;
        }

        #q_f {
            width: 50px;
        }
    </style>

    <p class=" py-3 text-center  bg-secondary">{{ 'Collection' . '/' . $data->category->name . '/' . $data->name }}</p>

    <br>
    <div class="container">

        <div class="card product_data">
            <div class="container">
                <div class="row">
                    <div class="col-5">
                        <img width="80%" height="400px"src="/product_image/{{ $data->image }}">
                    </div>
                    <div class="col-7">
                        @if ($data->quantity > 0)
                            <h6 class="badge bg-success text-dark"> In Stock</h6> <span> Maximum Quantity available :
                                {{ $data->quantity }} </span>
                        @else
                            <h6 class="badge bg-danger text-dark">Not In Stock</h6>
                        @endif




                        <div class="card-body">
                            <input type="hidden" value="{{ $data->id }}" class="prod_id">
                            <h5 class="card-title">{{ $data->name }}</h5>
                            <p class="card-text">{{ $data->small_desc }}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">{{ $data->description }}</li>

                            <p class=" text-decoration-line-through btn btn-warning">Orginal Price :
                                {{ $data->orginal_price }}</p>
                            <p class="btn  btn-success">Selling Price : {{ $data->selling_price }}</p>
                        </ul>


                        <br>


                        <div class="container">
                            <div class="row">
                                <div class="col-4">
                                    <table>
                                        <tr>
                                            <th><button class="input-group-text decrement-btn">-</button></th>
                                            <th><input id="q_f" type="text" name="p_qunatity"
                                                    class='form-control text-center p_quantity prod_qty' value='1'>
                                            </th>
                                            <th> <button class="input-group-text increment-btn">+</button></th>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-4">
                                   
                                        <a class="btn btn-primary addtocart_btn  " href=""> Add To Cart</a>
                                   
                                </div>
                                <div class="col-4">
                                    <a class="btn btn-success  " href=""> Add to watchlist</a>
                                </div>
                            </div>
                        </div>

                    </div>


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


        $('.addtocart_btn').click(function(e) {
            e.preventDefault();
            var product_id = $(this).closest('.product_data').find('.prod_id').val();
            var product_qty = $(this).closest('.product_data').find('.prod_qty').val();

            $.ajax({
                type: "POST",
                url: "/add-to-cart",
                data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },

                success: function(response) {
                    console.log(product_id);
                    swal(response.status);
                }
            });

        });




        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var inc_value = $('.p_quantity').val();
                var value = parseInt(inc_value, 10);
                value = isNaN(value) ? 0 : value;
                if (value < 10) {
                    value++;
                    $('.p_quantity').val(value);
                }

            });
        });


        $(document).ready(function() {
            $('.decrement-btn').click(function(e) {
                e.preventDefault();
                var inc_value = $('.p_quantity').val();
                var value = parseInt(inc_value, 0);
                value = isNaN(value) ? 0 : value;

                if (value > 0) {
                    value--;
                    $('.p_quantity').val(value);
                }

            });
        });
    </script>





</body>

</html>
