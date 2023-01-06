<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order view</title>
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
</head>
@include('layouts.front')

<body>
    <div class="container">
        <h2>Order History details</h2>
        <div class="row">
            <div class="col-6">
                <h2>Customer Details</h2>
                <h6 class="cus_d  p-2">Name : {{ $order_view->name }}</h6>
                <h6 class="cus_d  p-2">Address : {{ $order_view->address }}</h6>
                <h6 class="cus_d  p-2">City : {{ $order_view->city }}</h6>
                <h6 class="cus_d  p-2">Email : {{ $order_view->email }}</h6>
                <h6 class="cus_d  p-2">Phone Number : {{ $order_view->phone_number }}</h6>
                
                <h6 class="cus_d  p-2">Traking Number : {{ $order_view->traking_num }}</h6>
                
                @if ($order_view->status == '0')
                <h6 class="cus_d  p-2 badge bg-primary m-3"> Pending</h6>
                @else
                <h6 class="cus_d  p-2 badge bg-success m-3"> Completed</h6>
                @endif
            </div>
            <div class="col-6">
                <h2>Product Details</h2>
                <table>
                    <tr>
                    <tr>
                        <th>PRODUCT NAME</th>

                        <th>PRODUCT QUANTITY</th>
                        <th>PRICE</th>
                        <th>IMAGE</th>
                    </tr>
                    </thead>
                    </tr>
                    @foreach ($order_view->orderitems as $item)
                        <tr>
                            <td>{{ $item->product->name }}</td>
                            <td>{{ $item->qty }}</td>
                            <td>{{ $item->price }}</td>
                            <td><img width="50px" height="50px"src="/product_image/{{ $item->product->image }}">
                            </td>


                        </tr>
                    @endforeach

                </table>
                <hr>
                <h3 class="cus_d  p-2 my-5  bg-secondary">Total Price : {{ $order_view->total }}</h3>
            </div>

        </div>
    </div>





</body>

</html>
