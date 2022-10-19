@include('layouts.front')
<style>
    .table1 {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    td, th {
      border: 1px solid #dddddd;
      text-align: center;
      padding: 8px;
    }
    
    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
    </head>
    <body>
    
    <h2>Category Table</h2>
    
    <table class="table1">
      <tr>
        <tr>
            <th>ID</th>
            <th>NAME</th>
           
            <th>IMAGE</th>
            <th>ACTION</th>
            <th>Quantity</th>
          </tr>
        </thead>
      </tr>
      @foreach ($cart_data as $cart_data)
      <tr>
        <td>{{$cart_data->id}}</td>
        <td>{{$cart_data->name}}</td>
        <td><img class="img-responsive" height="100" width="100"src="/category_image/{{$cart_data->image}}" alt="image"></td>
        <td>
        <a href="{{url('delete_category/'.$cart_data->id)}}" class="btn btn-danger">Delete</a></td>
        <td>
            <div class="container">
                <div class="input-group text-center mb-3" style="width:130px; text-align:center;">
                    <button class="input-group-text decrement-btn">-</button>
                    <input id="q_f" type="text" name="p_qunatity"
                                    class='form-control text-center p_quantity prod_qty' value='1'>
                    <button class="input-group-text increment-btn">+</button>
                </div>
            </div>
        </td>
       
      </tr>
          
      @endforeach
     
    </table>