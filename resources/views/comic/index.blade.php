<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
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

      <div class="jumbotron text-center">
      <h1>Pick a Comic to Read</h1>

      <div class="row">
      @if(count($comicPosted) > 0)
        @foreach($comicPosted as $comic)

        <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/image/{{$comic->comic}}">
                <div class="card-body">
                  <p class="card-text">{{$comic->summary}}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a class="btn btn-secondary btn-lg btn-block" href="/comic/{{$comic->id}}">{{$comic->title}}</a> </br>

                    </div>
                    <form action="{{ url('favourites')}}" method="post">
                      {{ csrf_field()}}
                      <input type="hidden" name="postid" value="{{$comic->id}}">
                       <button type="submit" class="btn btn-primary">Add to favourite</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>

        @endforeach
      @else
        <p>Comics have not been uploaded</p>
      @endif
    </div>
      <p>Welcome to Web Comic sign up to read and create comics</p>
    </div>
    </body>
</html>
