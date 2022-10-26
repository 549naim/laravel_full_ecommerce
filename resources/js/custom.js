<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


    $('.addtocart_btn').click(function (e) { 
        e.preventDefault();
        var product_id = $(this).closest('.product_data').find('.prod_id').val();
        var product_qty = $(this).closest('.product_data').find('.prod_qty').val();
       
        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                'product_id':product_id,
                'product_qty':product_qty,
            },
           
            success: function (response) {
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

