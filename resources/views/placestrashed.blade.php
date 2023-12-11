<!DOCTYPE html>
<html lang="en">
<head>
  <title>trashed</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>trashed</h2>
        
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Title</th>
        <th>Price</th>
        <th class="text-center">Description</th>
        
       
        <th>show</th>
        <th>delete</th>
        <th>Edit</th>
        <th>Restore</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
        @foreach($places as $places)
      <tr>
        
        <td>{{$places->title}}</td>
        <td>{{$places->price1}}-{{$places->price2}}</td>
        <td>{{$places->description}}</td>
       
     
          <td><a href="editplaces/{{$places->id}}">Edit</a></td>
          <td><a href="restoreplaces/{{$places->id}}">restore</a></td>
          <td><a href="forcedelete/{{$places->id}}">delete</a></td>
      </tr>
     @endforeach
    </tbody>
  </table>
</div>

</body>
</html>
