

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
    <body>
    
    <h2>Category Table</h2>
    
    <table>
      <tr>
        <tr>
            <th>ID</th>
            <th>NAME</th>
            <th>DESCRIPTION</th>
            <th>IMAGE</th>
            <th>ACTION</th>
          </tr>
        </thead>
      </tr>
      @foreach ($category as $category)
      <tr>
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>{{$category->description}}</td>
        <td><img class="img-responsive" height="100" width="100"src="/category_image/{{$category->image}}" alt="image"></td>
        <td><a href="{{url('edit_category/'.$category->id)}}" class="btn btn-primary">Edit</a>
        <a href="{{url('delete_category/'.$category->id)}}" class="btn btn-danger">Delete</a></td>
      </tr>
          
      @endforeach
     
    </table>
    