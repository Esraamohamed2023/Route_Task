<!DOCTYPE html>
<html lang="en">
<head>
  <title>edite Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>update Car</h2>
  <form action="{{route('update',[$car->id])}}" method="post" enctype="multipart/form-data">
  @csrf
  @method('put')
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value=
      "{{$car->title}}">
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price" 
      value=
      "{{$car->price}}">
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea class="form-control" rows="5" id="description" name="description">{{$car->description}}</textarea>
      </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published" @checked($car->published)>published</label>
    </div>
    <div class="form-group">

      <label for="image">Image:</label>
    
      <img src="{{asset('assets/images/' . $car->image) }}" alt="Current Image" style="max-width: 200px; margin-bottom: 10px;">
      <input type="file" class="form-control" id="image" name="image" value="{{$car->image}}">
     


  </div>
  <div class="form-group">
    <label for="category_id">Select Category:</label>
    <select name="category_id" id="category_id">
        <option value="">Select category</option>
        @foreach ($category as $item)
            <option value="{{ $item->id }}" {{ old('category_id', $car->category_id) == $item->id ? 'selected' : '' }}>{{ $item->categoryName }}</option>
        @endforeach
    </select>
</div>

    <button type="submit" class="btn btn-default">update</button>
  </form>
</div>

</body>
</html>
