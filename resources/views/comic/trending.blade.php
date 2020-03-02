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
      <h1>Trending Results</h1>

      <div class="column">
      @if(count($trending) > 0)
        @foreach($trending as $comics)

        <div class="col-md-4">
              <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="/image/{{$comics->comic}}" alt="bigbox">
                <div class="card-body">
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <a class="btn btn-secondary btn-lg btn-block" href="/comic/{{$comics->id}}">{{$comics->title}}</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endforeach
      @else
        <p>You currently do not have any comics in your library</p>
      @endif
    </div>
      <p>Welcome to Web Comic sign up to read and create comics</p>
    </div>
    </body>
</html>
