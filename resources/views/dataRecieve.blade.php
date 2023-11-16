<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h2>Display Car Data</h2>
    <p><strong>Title:</strong> {{ $title }}</p>
    <p><strong>Price:</strong> {{ $price }}</p>
    <p><strong>Description:</strong> {{ $description}}</p>
    <p><strong>Published:</strong> {{ $published ? 'Yes' : 'No' }}</p>
</div>
</body>
</html>