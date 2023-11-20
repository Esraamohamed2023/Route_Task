<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Post</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Post</h2>
  <form action="{{route('add-post')}}" method="post">
  @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
    </div>
    <div class="form-group">
      <label for="price">Author:</label>
      <input type="text" class="form-control" id="price" placeholder="Enter Author" name="author">
    </div>
    <div class="form-group">
        <label for="description">Content:</label>
        <textarea class="form-control" rows="5" id="description" name="content"></textarea>
      </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published"> Published</label>
    </div>
    <button type="submit" class="btn btn-default">Post</button>
  </form>
</div>

</body>
</html>
