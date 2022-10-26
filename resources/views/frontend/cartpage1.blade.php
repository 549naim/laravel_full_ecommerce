<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    @include('layouts.front')
    <br>
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
    </style>



    <br>


    <div class="card product_data">
        <div class="input-group text-center mb-3">
            <table>
                <tr>
                    <th><button class="input-group-text decrement-btn">-</button></th>
                    <th><input id="q_f" type="text" name="p_qunatity"
                            class='form-control text-center p_quantity prod_qty' value='1'></th>
                    <th> <button class="input-group-text increment-btn">+</button></th>
                </tr>
            </table>
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
                    swal(response.status);
                }
            });

        });




        $(document).ready(function() {
            $('.increment-btn').click(function(e) {
                e.preventDefault();
                var inc_value = $('.p_quantity').val();
                // var inc_value = $(this).closest('.product_data').find('.prod_id').val();
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
