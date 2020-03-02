<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <title>Web Comic</title>

<script>
var slideIndex = 1;
showDivs(slideIndex);
function plusDivs(n) {
  showDivs(slideIndex += n);
}


function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}
</script>
    </head>
    <body>
      @foreach($userId as $userid)
    @if($userid->type === 1)
      @include('include.readnavigbar')
    @else
      @include('include.artnavigbar')
    @endif
    @endforeach
<a class="btn btn-dark btn-lg" href="/reviews">Click here to submit a review</a>
      <div class="jumbotron text-center">

      <h1>{{$comicId->title}}</h1>
      @if(count($pages) > 0)
        @foreach($pages as $pagesid)
        <div class="w3-container w3-center">
              <div class="w3-content w3-display-container">
          <img class = "mySlides" src="/image/{{$pagesid->imagepath}}" alt="images" width="800" height="700">
                </div>
          </div>
              <br> <br>
        @endforeach
      @else
        <p>No page has been uploaded</p>
      @endif

      <button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
      <button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
    </div>
    <div class="col-md-9" style="background-color:white;">
    <form action="{{ url('comment-submit')}}" method="post">
      {{ csrf_field()}}
      <input type="hidden" name="postid" value="{{$comicId->id}}">
      <textarea name="comment" placeholder="Comment on what you have read" style="height:200px; width:700px" required></textarea>
      <button type="submit" class="btn btn-dark">Submit Comment</button>
    </form>

    @if(count($comments) > 0)
      @foreach($comments as $comment)
      <h4>{{$comment->comments}} </h4><p><i>By {{$comment->firstname}} {{$comment->lastname}}</i></p></br></br></br>
      @endforeach
    @else
      <p>Nothing</p>
    @endif
</div>
    </body>
</html>
