<!DOCTYPE html>
<html lang="en">
<head>
  <title>Add Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Add Car</h2>
  <form action="{{ route('addcar') }}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" placeholder="Enter title" name="title" value="{{ old('title') }}">
      @error('title')
        <div class="alert alert-warning">{{ $message }}</div> 
      @enderror
    </div>
    <div class="form-group">
      <label for="price">Price:</label>
      <input type="number" class="form-control" id="price" placeholder="Enter Price" name="price"  value="{{ old('price') }}">
    </div>
    <div class="form-group">
      <label for="description">Description:</label>
      <textarea class="form-control" rows="5" id="description" name="description">{{ old('description') }}</textarea>
      @error('description')
        <div class="alert alert-warning">{{ $message }}</div> 
      @enderror
    </div> 
    <div class="checkbox">
      <label><input type="checkbox" name="published" {{ old('published') ? 'checked' : '' }}> Published</label>
    </div>
    <div class="form-group">
      <label for="image">Image:</label>
      <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
      @error('image')
        {{ $message }}
      @enderror
    </div>
    <div class="form-group">
      <label for="category_id">Select Category:</label>
      <select name="category_id" id="category_id">
        <option value="">Select category</option>
        @foreach ($category as $item)
          <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>{{ $item->categoryName }}</option>
        @endforeach
      </select>
    
    </div>
    <button type="submit" class="btn btn-default">Add</button>
  </form>
</div>

</body>
</html>
