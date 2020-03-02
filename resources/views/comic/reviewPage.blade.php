<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link href="css/bootstrap.css" rel>
        <title>Web Comic</title>

    </head>
    <body>
      @foreach($userId as $userid)
    @if($userid->type === 1)
      @include('include.readnavigbar')
    @else
      @include('include.artnavigbar')
    @endif
    @endforeach
      <form action="{{ url('reviews')}}" method="post">
      {{ csrf_field()}}
      <input type="hidden" name="postid" value="{{$postid}}">
      <textarea name="review" placeholder="Give a review" style="height:200px; width:700px" required></textarea>
      <i>Please give a rating from 1 to 5 </i> <input type="number" name="ratings" min="1" max="5" required/> </br> </br>
      <input type="submit" value="Submit Review ">
    </form>
<div class="col-md-9" style="background-color:lavenderblush;">
@if(count($review) > 0)
      @foreach($review as $reviews)

      <h3>{{$reviews->review}} <i>By {{$reviews->firstname}} {{$reviews->lastname}}</i></h3><p>Rated: {{$reviews->rating}}/5</p></br> </br>

      @endforeach
    @else
      <p>Nothing</p>
    @endif
  </div>
    </body>
</html>
