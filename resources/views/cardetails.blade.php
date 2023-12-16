<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Hover Rows</h2>
  <form action="{{ route('cardetails', $car->id) }}" method="post">
    @csrf

    <div>
        <div>car title:{{ $car->title }}</div>
        <div>car price :{{ $car->price }}</div>
        <div>car description :{{ $car->description }}</div>
        <div>car description :{{ $car->category->categoryName }}</div>
        <div>is published ?@if($car->published) yes✅ @else no❎ @endif</div>
    </div>
</form>
</body>
</html>
