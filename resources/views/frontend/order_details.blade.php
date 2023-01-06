<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
    <style>
        table {
          font-family: arial, sans-serif;
          border-collapse: collapse;
          width: 100%;
        }
        
        td, th {
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
      
        <h2>Order History</h2>
        
        <table>
          <tr>
            <tr>
                <th>TRACKING NUMBER</th>
                <th>NAME</th>
                <th>TOTAL PRICE</th>
                <th>STATUS</th>
                <th>ACTION</th>
              </tr>
            </thead>
          </tr>
          @foreach ($order_details as $item)
          <tr>
            <td>{{$item->traking_num}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->total}}</td>
            @if($item->status == '0')
            <td class="badge bg-primary m-3" >Pending</td>
            @else
            <td class="badge bg-success m-3">Completed</td>
            @endif 
            <td ><a href="{{ url('view_order_item/'.$item->id) }}" class="btn btn-primary">View</a>
           
          </tr>
              
          @endforeach
         
        </table>
    </div>
   
    
</body>
</html>