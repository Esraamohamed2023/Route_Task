<!DOCTYPE html>
<html lang="en">
<head>
  <title>cars show</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Price</th>
        <th>Description</th>
        <th>published</th>
        <th>Edit</th>
        <th>show</th>
        <th>delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($cars as $car)
      <tr>
        
        <td>{{$car['title']}}</td>
        <td>{{$car->price}}</td>
        <td>{{$car->description}}<span>{{$car->price}}</span></td>
        <td>yyyyyyyyyy<span>{{$car->price}}</span>yyyyyyyy</td>
       
        <td> @if($car->published)  yes✅ @else  no ❎ @endif  </td>
          <td><a href="editcar/{{$car->id}}">Edit</a></td>
          <td><a href="cardetails/{{$car->id}}">show</a></td>
          <td><a href="deletecar/{{$car->id}}">delete</a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
