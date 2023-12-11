<!DOCTYPE html>
<html lang="en">
<head>
  <title>results show</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Places Table</h2>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>id</th>
        <th>Title</th>
        <th>Price</th>
        <th class="text-center">Description</th>
        
        <th>Edit</th>
        <th>show</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($result as $row)
      <tr>
        
        <td>{{$row->id}}</td>
        <td>{{$row->title}}</td>
        <td>{{$row->price1}}$-{{$row->price2}}$</td>
        <td >   {{$row->description}}</td>
       
     
          <td><a href="editplace/{{$row->id}}">Edit</a></td>
          <td><a href="showplace/{{$row->id}}">show</a></td>
          <td><a href="deleteplace/{{$row->id}}">delete</a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
