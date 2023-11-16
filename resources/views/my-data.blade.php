<form method="post" action="{{route('receive')}}">
   {{csrf_field()}}
    <input type="text" name="name" placeholder="full name">
    <input type="submit" value="send" name="send">
</form>